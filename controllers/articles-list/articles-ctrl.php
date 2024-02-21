<?php
session_start();
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../models/Video.php';
require_once __DIR__ . '/../../models/Console.php';
require_once __DIR__ . '/../../helpers/Date_Comment.php';

try {
    // Récupérer l'ID du jeu et le numéro de la page depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    //Récupération des IDs nettoyés. Si l'ID est égal à 0, alors je retourne la valeur null.
    $gameId = $id_game == 0 ? null : $id_game;
    $categoryId = $id_category == 0 ? null : $id_category;

    // Obtenir le nombre total d'articles pour le jeu ou la console
    $nbArticles = Article::count(id_game: $gameId, id_category: $categoryId);

    // Calculer le nombre total de pages nécessaires pour afficher les articles
    $nbPages = ceil($nbArticles / 4);

    // S'assurer que la page actuelle est dans une plage valide
    $currentPage = ($currentPage > $nbPages) ? $nbPages : $currentPage;
    $currentPage = ($currentPage <= 0) ? 1 : $currentPage;

    // Récupérer les articles de la page actuelle pour le jeu donné
    $articles = Article::getAll($gameId, id_category: $categoryId, order: 'DESC', page: $currentPage, showConfirmedAt: true);

    Date_Comment::formatDateComment($articles);

    if ($id_category === REGEX_GUIDES) {
        $articlesSidebar = Article::getAll($gameId, id_category: REGEX_ARTICLES_GAMES, order: 'DESC');
    } else {
        $articlesSidebar = Article::getAll($gameId, id_category: REGEX_GUIDES, order: 'DESC');
    }
    Date_Comment::formatDateComment($articlesSidebar);
    $firstArticleSidebar = array_shift($articlesSidebar);

    $videos = Video::getAll($gameId, true, 4, 'DESC');
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles-list.php/articles.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
