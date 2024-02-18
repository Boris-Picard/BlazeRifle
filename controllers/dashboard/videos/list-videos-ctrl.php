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
    $nbVideos = intval(filter_input(INPUT_GET, 'nbVideos', FILTER_SANITIZE_NUMBER_INT));
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);

    $nvVideosToUse = !empty($nbVideos) ? $nbVideos : 100;

    $video = Video::get($id_video);
    $videos = Video::getAll(order: $order, limit: $nvVideosToUse);
    $games = Game::getAll();

    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if ($video) {
        Video::confirm($id_video);
        header('location: /controllers/dashboard/videos/list-videos-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/videos/list-videos.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
