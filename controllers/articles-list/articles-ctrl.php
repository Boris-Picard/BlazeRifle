<?php
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Console.php';

try {
    // Récupérer l'ID du jeu et le numéro de la page depuis la requête GET
    $id_game = filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT);
    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));
    $id_console = filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT);

    // Coalescente pour filtrer l'id_console ou game
    $gameId = isset($id_game) ? $id_game : null;
    $consoleId = isset($id_console) ? $id_console : null;
    // Obtenir le nombre total d'articles pour le jeu ou la console
    $nbArticles = Article::count(id_game: $gameId, id_console: $consoleId);

    // Calculer le nombre total de pages nécessaires pour afficher les articles
    $nbPages = ceil($nbArticles / 7);

    // S'assurer que la page actuelle est dans une plage valide
    $currentPage = ($currentPage > $nbPages) ? $nbPages : $currentPage;
    $currentPage = ($currentPage <= 0) ? 1 : $currentPage;

    // Récupérer les articles de la page actuelle pour le jeu donné
    $articles = Article::getAll($gameId, showDeletedAt: false, order: 'DESC', page: $currentPage);

    // Formater la date et l'heure de chaque article pour affichage
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
