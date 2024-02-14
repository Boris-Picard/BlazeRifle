<?php
session_start();
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../models/Console.php';

try {
    // Récupérer l'ID du jeu et le numéro de la page depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    // $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    //Récupération des IDs nettoyés. Si l'ID est égal à 0, alors je retourne la valeur null.
    $gameId = $id_game == 0 ? null : $id_game;
    // $consoleId = $id_console == 0 ? null : $id_console;

    // Obtenir le nombre total d'articles pour le jeu ou la console
    $nbArticles = Article::count(id_game: $gameId, id_category: REGEX_ARTICLES_JEUX);

    // Calculer le nombre total de pages nécessaires pour afficher les articles
    $nbPages = ceil($nbArticles / 7);

    // S'assurer que la page actuelle est dans une plage valide
    $currentPage = ($currentPage > $nbPages) ? $nbPages : $currentPage;
    $currentPage = ($currentPage <= 0) ? 1 : $currentPage;

    // Récupérer les articles de la page actuelle pour le jeu donné
    $articles = Article::getAll($gameId, id_category: REGEX_ARTICLES_JEUX, showDeletedAt: false, order: 'DESC', page: $currentPage);

    // Formater la date et l'heure de chaque article pour affichage
    foreach ($articles as $article) {
        $timestamp = strtotime($article->article_created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d-m-Y', $timestamp);
        $id_article = $article->id_article;
        $countComments = Comment::count($id_article);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}






include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles-list.php/articles.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
