<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Video.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listVideos = true;

try {
    $id_video = intval(filter_input(INPUT_GET, 'id_video', FILTER_SANITIZE_NUMBER_INT));

    $games = Game::getAll();
    $video = Video::get($id_video);

    // Vérification si la méthode de requête est POST pour traiter les données du formulaire
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyage et récupération du nom de la catégorie depuis le formulaire
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);

        // Validation du nom de la catégorie : non vide et conforme à une expression régulière
        if (empty($url)) {
            $error['url'] = 'Veuillez entrer un lien';
        } else {
            // Validation supplémentaire avec une expression régulière pour le format du nom
            $isOk = filter_var($url, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_YOUTUBE . '/')));
            if (!$isOk) {
                $error['url'] = 'Veuillez entrer un lien valide !';
            }
        }

        $gamesId = array_column($games, 'id_game');

        // Nettoyage du select du jeu et validation
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        // Gestion des erreurs et affichage des messages d'alerte
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        if (Video::isExist($url)) {
            $error['url'] = 'Vidéo déjà existante';
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Si pas d'erreur, procédure d'insertion de la catégorie
        if (empty($error)) {
            $newVideo = new Video();
            $newVideo->setGameVideo($url);
            $newVideo->setIdGame($id_game);

            $result = $newVideo->update();

            // Vérification du succès de l'insertion et redirection
            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-videos-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/videos/update-video.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
