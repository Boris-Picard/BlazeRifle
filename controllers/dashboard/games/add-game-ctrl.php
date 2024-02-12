<?php
session_start();
require_once __DIR__ . '/../../../helpers/Database.php';
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../models/Console_Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin(); // Vérifie si l'utilisateur a les droits d'administrateur.

$listGames = true;

try {
    $consoles = Console::getAll(); // Récupère toutes les consoles disponibles dans la base de données.

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

        try {
            if (empty($_FILES['picture']['name'])) {
                throw new Exception("Photo obligatoire"); // Vérifie qu'une photo est bien téléchargée.
            }
            if ($_FILES['picture']['error'] != 0) {
                throw new Exception("Erreur lors du transfert"); // Vérifie qu'il n'y a pas eu d'erreur lors du transfert de la photo.
            }
            if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                throw new Exception("Format de fichier non autorisé"); // Vérifie le format de la photo.
            }
            if ($_FILES['picture']['size'] >= MAX_FILESIZE) {
                throw new Exception("Poids dépassé!"); // Vérifie la taille de la photo.
            }

            $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION); // Extrait l'extension du fichier de la photo.
            $filename = uniqid() . '.' . $extension; // Génère un nom unique pour la photo.

            $from = $_FILES['picture']['tmp_name'];
            if (empty($error)) {
                $to = __DIR__ . '/../../../public/uploads/games/' . $filename; // Définit le chemin de destination pour la photo.
                $moveFile = move_uploaded_file($from, $to); // Déplace la photo dans le répertoire des uploads si aucune erreur.
            }
        } catch (\Throwable $th) {
            $error['picture'] = $th->getMessage(); // Capture et stocke l'erreur liée à la photo.
        }

        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !'; // Informe l'utilisateur en cas d'erreurs de validation.
        }

        if (Game::isExist($name)) {
            $error['isExist'] = 'Jeu déjà existant'; // Vérifie si le nom du jeu existe déjà dans la base de données.
            $alert['error'] = 'Jeu déjà existant';
        }

        if (empty($error)) {
            try {
                $pdo = Database::connect(); // Établit une connexion à la base de données.
                $pdo->beginTransaction(); // Commence une transaction pour assurer l'intégrité des données.

                $game = new Game(); // Crée une instance de la classe Game.
                $console_game = new Console_Game(); // Crée une instance de la classe Console_Game.

                $game->setGameName($name); // Attribue le nom au jeu.
                $game->setGameDescription($description); // Attribue la description au jeu.
                $game->setGamePicture($filename); // Attribue le nom de fichier de la photo au jeu.

                $result = $game->insert(); // Insère le jeu dans la base de données.

                $id_game = $pdo->lastInsertId(); // Récupère l'ID du jeu inséré.

                foreach ($selectedConsoles as $value) {
                    $console_game->setIdGame($id_game); // Attribue l'ID du jeu.
                    $console_game->setIdConsole($value); // Attribue l'ID de la console.
                    $console_game->insert(); // Insère la relation entre le jeu et la console.
                }

                $pdo->commit(); // Valide la transaction.

                if ($result && $console_game) {
                    $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).'; // Affiche un message de succès si l'insertion est réussie.
                    header('Refresh:3; url=list-games-ctrl.php'); // Redirige vers la liste des jeux.
                }
            } catch (PDOException $e) {
                $pdo->rollback(); // Annule la transaction en cas d'erreur.
                $alert['error'] = 'Erreur lors de l\'insertion' . $e->getMessage(); // Affiche un message d'erreur.
                header('Refresh:3; url=add-game-ctrl.php'); // Redirige vers le formulaire d'ajout en cas d'erreur.
            }
        }
    }
} catch (PDOException $e) {
    $alert['error'] = 'Erreur lors de la soumission du formulaire' . $e->getMessage(); // Affiche un message d'erreur en cas de problème avec la base de données.
    header('Refresh:3; url=add-game-ctrl.php'); // Redirige vers le formulaire d'ajout en cas d'erreur.
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/add-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
