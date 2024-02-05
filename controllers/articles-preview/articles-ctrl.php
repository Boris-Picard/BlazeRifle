<?php
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';

try {
    $articles = Article::getAll();
    $games = Game::getAll();
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles-preview/articles.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';