<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';

try {
    // Récupération de l'ID de l'article à mettre à jour depuis les paramètres de l'URL
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des détails de l'article à mettre à jour
    $article = Article::get($id_article);

    // Si l'article a une image associée
    if ($article->article_picture) {
        // Tentative de suppression du fichier image associé
        $link = unlink('../../../public/uploads/article/' . $article->article_picture);

        // Mise à jour du champ image dans la base de données
        $deleteImg = Article::updateImg($id_article);
    }

    // Gestion des messages de session en fonction du succès ou de l'échec de la suppression d'image
    if ($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur : l\'image n\'a pas été supprimée !';
    }

    // Redirection vers le contrôleur de mise à jour de l'article avec l'ID de l'article
    header('Location: /controllers/dashboard/articles/update-article-ctrl.php?id=' . $article->id_article);
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/update-article.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
