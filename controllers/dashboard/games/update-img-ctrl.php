<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';

try {
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $game = Game::get($id_game);


    if($game->game_picture) {
        $link = unlink('../../../public/uploads/games/'.$game->game_picture);
        $deleteImg = Game::updateImg($id_game);
    }

    if($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }
    
    header('Location: /controllers/dashboard/games/update-game-ctrl.php?id='.$game->id_game);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/update-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';