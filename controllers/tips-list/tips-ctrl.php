<?php
session_start();
require_once __DIR__ . '/../../helpers/CheckPermissions.php';
require_once __DIR__ . '/../../helpers/Date_Comment.php';
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Comment.php';

CheckPermissions::checkMember();

try {
    $activeTips = true;

    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    // Obtenir le nombre total d'articles pour le jeu ou la console
    $nbArticles = Article::count(id_game:3, id_category: REGEX_TIPS);

    // Calculer le nombre total de pages nécessaires pour afficher les articles
    $nbPages = ceil($nbArticles / 4);

    // S'assurer que la page actuelle est dans une plage valide
    $currentPage = ($currentPage > $nbPages) ? $nbPages : $currentPage;
    $currentPage = ($currentPage <= 0) ? 1 : $currentPage;

    // Récupérer les articles de la page actuelle pour le jeu donné
    $articles = Article::getAll(id_game:3, id_category: REGEX_TIPS, showConfirmedAt: true, order: 'DESC', limit: 4, page: $currentPage);

    Date_Comment::formatDateComment($articles);
    
} catch (PDOException $e) {
    die('Erreur tips : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/tips-list/tips.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
