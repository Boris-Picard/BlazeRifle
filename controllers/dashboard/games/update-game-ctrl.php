<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console_Game.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listGames = true;


try {
    // Récupérer l'ID du jeu depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer les détails du jeu
    $game = Game::get($id_game);
    $console_id = Game::getConsoleIdsByGameId($id_game);

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    $consoles = Console::getAll(); // Récupère toutes les consoles disponibles dans la base de données.
    // Vérifier si la requête est une soumission de formulaire (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyer et valider le nom du jeu
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS); // Nettoie et récupère le nom du jeu depuis le formulaire.

        if (empty($name)) {
            $error['name'] = 'Veuillez renseigner un nom'; // Vérifie que le nom du jeu n'est pas vide.
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['name'] = 'Veuillez renseigner un nom de jeu correct';
            }
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS); // Nettoie et récupère la description du jeu depuis le formulaire.

        if (empty($description)) {
            $error['description'] = 'Veuillez renseigner une description'; // Vérifie que la description n'est pas vide.
        } else {
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            if (!$isOk) {
                $error['description'] = 'Veuillez renseigner une description de jeu correct';
            }
        }

        $selectedConsoles = filter_input(INPUT_POST, 'consoles', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? []; // Nettoie et récupère les consoles sélectionnées depuis le formulaire.
        $id_console = array_column($consoles, 'id_console'); // Extrait les ID des consoles pour vérification.

        if (empty($selectedConsoles)) {
            $error["consoles"] = "Veuillez choisir une console"; // Vérifie que au moins une console est sélectionnée.
        }
        foreach ($selectedConsoles as $value) {
            if (!in_array($value, $id_console)) {
                $error["consoles"] = "Certaines consoles choisis ne sont pas valides"; // Vérifie la validité des consoles sélectionnées.
                break;
            }
        }

        // Récupérer le nom de fichier actuel ou générer un nouveau nom de fichier
        $filename = $game->game_picture;

        // Vérifier si une nouvelle image a été téléchargée
        if (empty($filename)) {
            try {
                // Vérifier les erreurs liées au téléchargement de l'image
                if (empty($_FILES['picture']['name'])) {
                    throw new Exception("Photo obligatoire");
                }
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Erreur lors du transfert");
                }

                // Vérifier le format de fichier autorisé
                if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                    throw new Exception("Format de fichier non autorisé");
                }

                // Vérifier la taille maximale du fichier
                if ($_FILES['picture']['size'] >= MAX_FILESIZE) {
                    throw new Exception("Poids dépassé!");
                }

                // Générer un nom de fichier unique et déplacer l'image téléchargée
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $from = $_FILES['picture']['tmp_name'];
                // Déplacement du fichier téléchargé vers le répertoire de destination
                if (empty($error)) {
                    $to = __DIR__ . '/../../../public/uploads/games/' . $filename;
                    $moveFile = move_uploaded_file($from, $to);
                }
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Vérification de l'existence d'un jeu avec le même nom.
        // Si le nom existe déjà dans la base de données et n'est pas celui du jeu actuel, déclencher une erreur.
        if (Game::isExist($name) && $name != $game->game_name) {
            $error['isExist'] = 'Jeu déjà existant';
            $alert['error'] = 'Jeu déjà existant';
        }
        // Si aucune erreur, mettre à jour les données du jeu
        if (empty($error)) {
            try {
                $pdo = Database::connect(); // Établit une connexion à la base de données.
                $pdo->beginTransaction(); // Commence une transaction pour assurer l'intégrité des données.

                $game = new Game(); // Crée une instance de la classe Game.

                $game->setGameName($name); // Attribue le nom au jeu.
                $game->setGameDescription($description); // Attribue la description au jeu.
                $game->setGamePicture($filename); // Attribue le nom de fichier de la photo au jeu.
                $game->setIdGame($id_game);

                $result = $game->update();

                // Suppression des associations non désirées
                foreach ($console_id as $consoleId) {
                    if (!in_array($consoleId, $selectedConsoles)) {
                        Console_Game::delete($consoleId, $id_game);
                    }
                }

                // Ajouter des associations pour les nouvelles consoles sélectionnées
                foreach ($selectedConsoles as $selectedConsoleId) {
                    if (!in_array($selectedConsoleId, $console_id)) {
                        $console_game = new Console_Game();
                        $console_game->setIdGame($id_game);
                        $console_game->setIdConsole($selectedConsoleId);
                        $console_game->insert();
                    }
                }

                $result = $pdo->commit(); // Valide la transaction.

                if ($result) {
                    $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).'; // Affiche un message de succès si l'insertion est réussie.
                    header('Refresh:3; url=list-games-ctrl.php'); // Redirige vers la liste des jeux.
                }
            } catch (PDOException $e) {
                $pdo->rollback(); // Annule la transaction en cas d'erreur.
                $alert['error'] = 'Erreur lors de l\'insertion' . $e->getMessage(); // Affiche un message d'erreur.
                header('Refresh:3; url=list-games-ctrl.php'); // Redirige vers le formulaire d'ajout en cas d'erreur.
            }
        }

        // Recharger les détails du jeu après la soumission du formulaire
        $game = Game::get($id_game);
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/update-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
