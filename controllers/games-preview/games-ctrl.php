<?php

require_once __DIR__ . '/../../models/Game.php';



try {

    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    $game = Game::get($id_game);

    
} catch (PDOException $e) {
    $e->getMessage();
}




include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/games-preview/games.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';