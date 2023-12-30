<?php
include(dirname(__FILE__) . '/../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $games = filter_input(INPUT_POST, 'games', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($games)) {
        $error['games'] = 'Veuillez séléctionner un jeu';
    } elseif (!in_array($games, $gamesArray)) {
        $error['games'] = 'Ce n\'est pas un jeu valide';
    }
}






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/calendar/calendar.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
