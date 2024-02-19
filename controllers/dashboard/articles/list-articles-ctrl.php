<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    // Indique que l'on est dans le contexte de la liste des articles
    $listArticles = true;

    // Récupération des paramètres depuis l'URL
    $id_article = intval(filter_input(INPUT_GET, 'id_article', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbArticles = intval(filter_input(INPUT_GET, 'nbArticles', FILTER_SANITIZE_NUMBER_INT));
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));



    $categories = Category::getAll();

    $category = Category::get(id_category: $id_category);

    $game = Game::get($id_game);

    // Récupération de la liste de tous les jeux
    $games = Game::getAll();
    // Si l'ordre n'est pas spécifié dans l'URL, par défaut, il est défini à 'DESC'
    if ($order == null) {
        $order = 'DESC';
    }

    // Définition des paramètres à utiliser dans la récupération de tous les articles
    $id_gameToUse = !empty($id_game) ? $id_game : null;
    $nbArticlesToUse = !empty($nbArticles) ? $nbArticles : 100;
    $idCategoryToUse = !empty($id_category) ? $id_category : null;

    // Récupération de la liste des articles en fonction des paramètres
    $articles = Article::getAll($id_gameToUse, showDeletedAt: false, id_category: $idCategoryToUse, showConfirmedAt: false, limit: $nbArticlesToUse, order: $order);
    // Récupération des détails de l'article spécifié par son ID
    $article = Article::get($id_article);
    // Si l'article spécifié existe

    Article::confirm($id_article);

    // Récupération et nettoyage du message de session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if ($article) {
        // Archivage de l'article
        Article::archive($id_article, false);
        // Redirection vers le contrôleur de gestion de la liste des articles
        header('location: /controllers/dashboard/articles/list-articles-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}






include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/list-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
