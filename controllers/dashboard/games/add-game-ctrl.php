<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Game.php';

$listGames = true;

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = 'Veuillez renseigner un nom';
        } else {
            if (strlen($name) > 150 || strlen($name) < 10) {
                $error['name'] = 'Veuillez renseigner un longueur valable de jeu';
            }
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez renseigner une description';
        } else {
            if (strlen($description) > 500 || strlen($description) < 150) {
                $error['description'] = 'Veuillez renseigner un longueur valable de description';
            }
        }
        
            try {
                if (empty($_FILES['picture']['name'])) {
                    throw new Exception("Photo obligatoire");
                }
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Erreur lors du transfert");
                }

                if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                    throw new Exception("Format de fichier non autorisé");
                }

                if ($_FILES['picture']['size'] >= MAX_FILESIZE) {
                    throw new Exception("Poids dépassé!");
                }
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $from = $_FILES['picture']['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/games/' . $filename;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }

        if(empty($error)) {
            $game = new Game();

            $game->setName($name);
            $game->setDescription($description);
            $game->setPicture($filename);

            $game->insert();

            if($game) {
                echo 'Donnée inserée';
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
