<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../models/Console_Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listGames = true;

try {
    $consoles = Console::getAll();

    // Vérification de la méthode de la requête (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Récupération nettoyage et validation du nom du jeu
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du nom
        if (empty($name)) {
            $error['name'] = 'Veuillez renseigner un nom';
        } else {
            // Validation de la longueur du nom
            if (strlen($name) > 150 || strlen($name) < 2) {
                $error['name'] = 'Veuillez renseigner une longueur valable pour le nom du jeu';
            }
        }

        // Récupération nettoyage et validation de la description du jeu
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation de la description
        if (empty($description)) {
            $error['description'] = 'Veuillez renseigner une description';
        } else {
            // Validation de la longueur de la description
            if (strlen($description) > 500 || strlen($description) < 150) {
                $error['description'] = 'Veuillez renseigner une longueur valable pour la description du jeu';
            }
        }

        $selectedConsoles = filter_input(INPUT_POST, 'consoles', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY) ?? [];
        if (empty($selectedConsoles)) {
            $error["consoles"] = "Veuillez choisir une console";
        }
        foreach ($selectedConsoles as $value) {
            // var_dump($selectedConsoles);
            // die;
            if ($value != $consoles) {
                $error["consoles"] = "Certaines consoles choisis ne sont pas bons";
            }
        }

        try {
            // Vérification de la présence d'une photo
            if (empty($_FILES['picture']['name'])) {
                throw new Exception("Photo obligatoire");
            }
            // Vérification des erreurs lors du transfert de la photo
            if ($_FILES['picture']['error'] != 0) {
                throw new Exception("Erreur lors du transfert");
            }
            // Vérification du format de fichier autorisé
            if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                throw new Exception("Format de fichier non autorisé");
            }
            // Vérification du poids de la photo
            if ($_FILES['picture']['size'] >= MAX_FILESIZE) {
                throw new Exception("Poids dépassé!");
            }

            // Génération d'un nom unique pour la photo
            $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;

            // Déplacement de la photo vers le répertoire d'uploads
            $from = $_FILES['picture']['tmp_name'];
            $to = __DIR__ . '/../../../public/uploads/games/' . $filename;
            // Déplacement du fichier téléchargé vers le répertoire de destination
            if (empty($error)) {
                $moveFile = move_uploaded_file($from, $to);
            }
        } catch (\Throwable $th) {
            $error['picture'] = $th->getMessage();
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        //Condition pour vérifier si la donnée dans la colonne 'game_name' existe déjà ou non. Si c'est vrai, bloquer l'envoi de la donnée.
        if (Game::isExist($name)) {
            $error['isExist'] = 'Jeu déjà existant';
            $alert['error'] = 'Jeu déjà existant';
        }

        // Vérification s'il n'y a pas d'erreurs
        if (empty($error)) {
            // Création d'une instance de la classe Game
            $game = new Game();

            // Attribution des valeurs aux propriétés de l'objet Game
            $game->setGameName($name);
            $game->setGameDescription($description);
            $game->setGamePicture($filename);

            // Insertion du jeu dans la base de données
            $result = $game->insert();

            // Si l'insertion a réussi, affichage d'un message de succès et redirection
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-games-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/add-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
