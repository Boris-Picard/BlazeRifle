<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Event.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Article.php';

try {
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    $games = Game::getAll();


    $articles = Article::getAll($id_game, order: 'DESC');

    $events = Event::getAll($id_game);

    // formattage de la date en français
    $formatter = new IntlDateFormatter('fr_FR');
    $formatter->setPattern('EEEE dd MMMM YYYY');

    foreach ($events as $event) {
        $timestamp = strtotime($event->event_date);
        $event->formattedHour = date('H:i', $timestamp);
        $event->formattedDate = date('d-m-Y', $timestamp);
        $event->formattedMonth = $formatter->format($timestamp);
    }
} catch (PDOException $e) {
    $e->getMessage();
}








include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/calendar/calendar.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
