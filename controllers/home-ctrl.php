<?php
session_start();
require_once __DIR__ . '/../models/Article.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../helpers/Date_Comment.php';

try {
    $articles = Article::getAll(id_category: REGEX_ARTICLES_GAMES, limit: 4, showConfirmedAt: true, order: 'DESC');
    
    Date_Comment::formatDateComment($articles);

    $firstArticle = array_shift($articles);

    $sideArticles = Article::getAll(id_category: REGEX_ARTICLES_GAMES, limit: 5, offset: 4, showConfirmedAt: true, order: 'DESC');

    Date_Comment::formatDateComment($sideArticles);

    $guides = Article::getAll(id_category: REGEX_GUIDES, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($guides);
    $firstGuide = array_shift($guides);

    $sideGuides = Article::getAll(id_category: REGEX_GUIDES, limit: 6, offset: 1, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($sideGuides);

    $games = Game::getAll();
    $firstThreeGames = array_slice($games, 0, 4);
    $gamesUnder = array_slice($games, 4, 8);

    $tips = Article::getAll(id_category: REGEX_TIPS, limit: 5, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($tips);
    $firstTips = array_shift($tips);

    $tipsSecondCol = Article::getAll(id_category: REGEX_TIPS, limit: 4, offset: 5, showConfirmedAt: true, order: 'DESC');
    Date_Comment::formatDateComment($tipsSecondCol);

    // Récupérer tous les jeux à partir de la classe Game
    $games = Game::getAll();

    // Parcourir la liste des jeux
    foreach ($games as $game) {
        // Récupérer l'identifiant du jeu en cours
        $id_game = $game->id_game;
        // Récupérer les 10 premiers articles associés à ce jeu depuis la classe Article
        $articles = Article::getAll($id_game, id_category: REGEX_ARTICLES_GAMES, limit: 10, order: 'DESC');
        // Stocker les articles dans un tableau associatif en utilisant l'identifiant du jeu comme clé
        $allArticles[$id_game] = $articles;
    }

    $events = Event::getAll(limit: 4, offset: 0);
    Date_Comment::eventDate($events);
} catch (PDOException $e) {
    die('Erreur articles home : ' . $e->getMessage());
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/socials.php';
include __DIR__ . '/../views/templates/footer.php';
