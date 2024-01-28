<?php
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';

try {

    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    $articles = Article::getAll($id_game,false);
    
    foreach ($articles as $article) {
        $timestamp = strtotime($article->created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d-m-Y', $timestamp);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles-list.php/articles.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
