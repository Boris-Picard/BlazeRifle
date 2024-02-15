<?php
session_start();
require_once __DIR__ . '/../models/Article.php';
require_once __DIR__ . '/../models/Comment.php';
require_once __DIR__ . '/../helpers/Date_Comment.php';

try {
    $articles = Article::getAll(id_category: REGEX_ARTICLES_GAMES, limit: 4, showConfirmedAt: true, order: 'DESC');

    Date_Comment::formatDateComment($articles);

    $firstArticle = array_shift($articles);

    $sideArticles = Article::getAll(id_category: REGEX_ARTICLES_GAMES, limit: 5, offset: 4, showConfirmedAt: true, order: 'DESC');

    Date_Comment::formatDateComment($sideArticles);

} catch (PDOException $e) {
    die('Erreur articles home : ' . $e->getMessage());
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/socials.php';
include __DIR__ . '/../views/templates/footer.php';
