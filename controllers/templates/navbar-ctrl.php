<?php
require_once __DIR__ . '/../../models/Game.php';

try {
    $games = Game::getAll();
    
} catch (\Throwable $e) {
    $e->getMessage();
}



include __DIR__ . '/../../views/templates/navbar.php';