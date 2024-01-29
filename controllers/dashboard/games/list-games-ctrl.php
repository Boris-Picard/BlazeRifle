<?php

require_once __DIR__ . '/../../../models/Game.php';

$listGames = true;

try {
    $games = Game::getAll();

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    $e->getMessage();
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/list-games.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
