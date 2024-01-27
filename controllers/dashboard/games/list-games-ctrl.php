<?php

require_once __DIR__ . '/../../../models/Game.php';

$listGames = true;

try {
    $games = Game::getAll();
} catch (PDOException $e) {
    $e->getMessage();
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/list-games.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
