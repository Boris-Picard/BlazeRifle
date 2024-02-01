<?php

require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Article.php';



try {
    // Récupérer l'ID du jeu depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer les 4 premiers articles pour le jeu spécifié, triés par ordre décroissant
    $articles = Article::getAll($id_game, limit: 4, order: 'DESC');

    // Récupérer les 4 articles suivants pour le jeu spécifié, triés par ordre décroissant, en commençant à partir du 5e article
    $articlesUnder = Article::getAll($id_game, limit: 4, offset: 4, order: 'DESC');
} catch (PDOException $e) {
    $e->getMessage();
    die;
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/games-preview/games.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
