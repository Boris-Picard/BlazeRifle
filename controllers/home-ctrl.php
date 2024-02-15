<?php
session_start();
require_once __DIR__ . '/../models/Article.php';

try {
    $articles = Article::getAll(id_category: REGEX_ARTICLES_GAMES, limit: 4, showConfirmedAt: true, order: 'DESC');
} catch (PDOException $e) {
    die('Erreur articles home : ' . $e->getMessage());
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/templates/navbar.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/socials.php';
include __DIR__ . '/../views/templates/footer.php';
