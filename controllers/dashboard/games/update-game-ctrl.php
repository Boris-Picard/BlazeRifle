<?php

require_once __DIR__ . '/../../../models/Game.php';

$listGames = true;


try {
    // Récupérer l'ID du jeu depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer les détails du jeu
    $game = Game::get($id_game);

    // Vérifier si la requête est une soumission de formulaire (POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyer et valider le nom du jeu
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($name)) {
            $error['name'] = 'Veuillez renseigner un nom';
        } else {
            if (strlen($name) > 150 || strlen($name) < 2) {
                $error['name'] = 'Veuillez renseigner une longueur de jeu valide';
            }
        }

        // Nettoyer et valider la description du jeu
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $error['description'] = 'Veuillez renseigner une description';
        } else {
            if (strlen($description) > 500 || strlen($description) < 150) {
                $error['description'] = 'Veuillez renseigner une longueur de description valide';
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
                $to = __DIR__ . '/../../../public/uploads/games/' . $filename;
                // Déplacement du fichier téléchargé vers le répertoire de destination
                if (empty($error)) {
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
            $game = new Game();

            $game->setGameName($name);
            $game->setGameDescription($description);
            $game->setGamePicture($filename);
            $game->setIdGame($id_game);

            // Mettre à jour les données dans la base de données
            $result = $game->update();

            // Afficher un message de réussite et rediriger après la mise à jour
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-games-ctrl.php');
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
