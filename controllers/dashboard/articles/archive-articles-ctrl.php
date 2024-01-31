<?php
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';


try {
    $listArticles = true;
    
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    $article = Article::get($id_article);
    $articles = Article::getAll(showDeletedAt: true);

    $games = Game::getAll();

    if (!empty($id_game)) {
        $articles = Article::getAll($id_game, showDeletedAt: true);
    } else {
        $articles = Article::getAll(showDeletedAt: true);
    }

    if($article) {
        Article::archive($id_article, true);
        header('location: /controllers/dashboard/articles/archive-articles-ctrl.php');
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/archive-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';