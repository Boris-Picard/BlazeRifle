<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';


try {
    
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
    
    $game = Game::get($id_game);

    $isDeleted = Game::delete($id_game);

    if($isDeleted > 0) {
        $link = unlink('../../../public/uploads/games/'.$game->game_picture);
    }

    if($isDeleted) {
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }

    header('Location: /controllers/dashboard/games/list-games-ctrl.php');
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/list-games.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';