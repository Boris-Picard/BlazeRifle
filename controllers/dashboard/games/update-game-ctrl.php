<?php

require_once __DIR__ . '/../../../models/Game.php';

$listGames = true;


try {

    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $game = Game::get($id_game);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = 'Veuillez renseigner un nom';
        } else {
            if (strlen($name) > 150 || strlen($name) < 2) {
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

        $filename = $game->game_picture;

        if (empty($filename)) {
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
        }

        // var_dump($filename);
        // die;

        if (empty($error)) {
            $game = new Game();

            $game->setName($name);
            $game->setGameDescription($description);
            $game->setGamePicture($filename);
            $game->setIdGame($id_game);

            $result = $game->update();

            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-games-ctrl.php');
            }
        }
        $game = Game::get($id_game);
    }
} catch (PDOException $e) {
    $error['error'] = $e->getMessage();
}








include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/update-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
