<?php
session_start();
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';

try {
    // Récupérer tous les jeux à partir de la classe Game
    $games = Game::getAll();

    // Parcourir la liste des jeux
    foreach ($games as $game) {
        // Récupérer l'identifiant du jeu en cours
        $id_game = $game->id_game;

        // Récupérer les 10 premiers articles associés à ce jeu depuis la classe Article
        $articles = Article::getAll($id_game, limit: 10);

        // Stocker les articles dans un tableau associatif en utilisant l'identifiant du jeu comme clé
        $allArticles[$id_game] = $articles;
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles-preview/articles.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
