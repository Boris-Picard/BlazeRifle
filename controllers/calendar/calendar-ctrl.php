<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Event.php';
require_once __DIR__ . '/../../models/Game.php';

try {

    $games = Game::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $gamesId = array_column($games, 'id_game');

        // Nettoyage et validation du select d'un jeu
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        if (empty($error)) {
            $events = Event::getAll($id_game);
            // var_dump($events);
            // die;
        }
    }
} catch (PDOException $e) {
    $e->getMessage();
}








include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/calendar/calendar.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
