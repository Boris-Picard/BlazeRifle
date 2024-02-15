<?php
session_start();
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../helpers/Date_Comment.php';



try {
    // Récupérer l'ID du jeu ou de la console depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    // $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    //Récupération des IDs nettoyés. Si l'ID est égal à 0, alors je retourne la valeur null.
    $gameId = $id_game == 0 ? null : $id_game;
    // $consoleId = $id_console == 0 ? null : $id_console;

    // Récupérer les 4 premiers articles pour le jeu spécifié, triés par ordre décroissant
    $articles = Article::getAll($gameId, id_category: REGEX_ARTICLES_GAMES, limit: 4, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($articles);

    // Récupérer les 4 articles suivants pour le jeu spécifié, triés par ordre décroissant, en commençant à partir du 5e article
    $articlesUnder = Article::getAll($gameId, id_category: REGEX_ARTICLES_GAMES, limit: 4, showConfirmedAt: true, offset: 4, order: 'DESC');
    Date_Comment::formatDateComment($articlesUnder);

    $guides = Article::getAll($gameId, id_category: REGEX_GUIDES, limit: 5, offset: 0, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($guides);
    $firstGuide = array_shift($guides);

    $guidesSecondCol = Article::getAll($gameId, id_category: REGEX_GUIDES, limit: 4, offset: 5, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($guidesSecondCol);
} catch (PDOException $e) {
    die('Erreur ctrl games :' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/games-preview/games.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
