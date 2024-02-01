<?php
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';


try {
    $listArticles = true;

    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbArticles = intval(filter_input(INPUT_GET, 'nbArticles', FILTER_SANITIZE_SPECIAL_CHARS));

    $games = Game::getAll();

    if ($order == null) {
        $order = 'DESC';
    }

    $article = Article::get($id_article);
    // $articles = Article::getAll(showDeletedAt: true, order: $order);

    if (!empty($id_game) && !empty($nbArticles)) {
        $articles = Article::getAll($id_game, showDeletedAt: true, limit: $nbArticles, order: $order);
    } elseif(empty($id_game) && empty($nbArticles)) {
        $articles = Article::getAll(showDeletedAt: true, limit: 100, order: $order);
    } elseif(!empty($nbArticles)) {
        $articles = Article::getAll(showDeletedAt: true, limit: $nbArticles, order: $order);
    } else {
        $articles = Article::getAll($id_game, showDeletedAt: true, limit: 100, order: $order);
    }

    if ($article) {
        Article::archive($id_article, true);
        header('location: /controllers/dashboard/articles/archive-articles-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/archive-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
