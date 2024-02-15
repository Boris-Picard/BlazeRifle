<?php
session_start();
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Comment.php';

try {
    $articles = Article::getAll(id_category: REGEX_GUIDES, showConfirmedAt: true, order: 'DESC');
    
    $allArticles = [];
    foreach ($articles as $article) {
        // Récupérer les 10 premiers articles associés à ce jeu depuis la classe Article
        $articles = Article::getAll($article->id_game, id_category: REGEX_GUIDES, showConfirmedAt: true, limit: 4, order: 'DESC');
        // Stocker les articles dans un tableau associatif en utilisant l'identifiant du jeu comme clé
        $allArticles[$article->id_game] = $articles;
    }

    // Formater la date et l'heure de chaque article pour affichage
    foreach ($articles as $article) {
        $timestamp = strtotime($article->article_created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d-m-y', $timestamp);
        $countComments = Comment::count($article->id_article);
        $article->countComments = $countComments;
    }

} catch (PDOException $e) {
    die('Erreur guides : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/guides-preview/guides.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
