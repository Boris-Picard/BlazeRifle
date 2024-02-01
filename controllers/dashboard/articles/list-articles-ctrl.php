<?php
session_start();
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

    $id_gameToUse = !empty($id_game) ? $id_game : null;
    $nbArticlesToUse = !empty($nbArticles) ? $nbArticles : 100;

    $articles = Article::getAll($id_gameToUse, showDeletedAt: false, limit: $nbArticlesToUse, order: $order);

    $article = Article::get($id_article);

    if ($article) {
        Article::archive($id_article, false);
        header('location: /controllers/dashboard/articles/list-articles-ctrl.php');
    }

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/list-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
