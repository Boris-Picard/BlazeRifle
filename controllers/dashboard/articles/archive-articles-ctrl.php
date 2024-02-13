<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    $listArticles = true;

    // Récupération des paramètres depuis l'URL
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbArticles = intval(filter_input(INPUT_GET, 'nbArticles', FILTER_SANITIZE_SPECIAL_CHARS));
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));


    $categories = Category::getAll();

    $category = Category::get($id_category);

    $game = Game::get($id_game);

    $comments = Comment::count($id_article);
    // Récupération de la liste de tous les jeux
    $games = Game::getAll();

    // Si l'ordre n'est pas spécifié dans l'URL, par défaut, il est défini à 'DESC'
    if ($order == null) {
        $order = 'DESC';
    }

    // Récupération des détails de l'article spécifié par son ID
    $article = Article::get($id_article);

    // Définition des paramètres à utiliser dans la récupération de tous les articles
    $id_gameToUse = !empty($id_game) ? $id_game : null;
    $nbArticlesToUse = !empty($nbArticles) ? $nbArticles : 100;
    $idCategoryToUse = !empty($id_category) ? $id_category : null;

    // Récupération de la liste des articles en fonction des paramètres
    $articles = Article::getAll($id_gameToUse, showDeletedAt: true, id_category: $idCategoryToUse, limit: $nbArticlesToUse, order: $order);

    // Si l'article spécifié existe
    if ($article) {
        // Archiver l'article spécifié
        Article::archive($id_article, true);

        // Redirection vers le contrôleur de gestion des articles archivés
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
