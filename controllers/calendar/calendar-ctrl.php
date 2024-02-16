<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Event.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Article.php';

try {
    $activeCalendar = true;
    // Récupérer l'ID du jeu depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer tous les jeux disponibles
    $games = Game::getAll();

    // Récupérer tous les articles pour le jeu spécifié, triés par ordre décroissant
    $articles = Article::getAll($id_game, order: 'DESC');
    // Récupérer tous les événements associés au jeu spécifié
    $events = Event::getAll($id_game);

    // Créer un formateur de date pour formater la date en français
    $formatter = new IntlDateFormatter('fr_FR');
    $formatter->setPattern('EEEE dd MMMM YYYY');

    // Formater la date et l'heure de chaque événement pour affichage
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
