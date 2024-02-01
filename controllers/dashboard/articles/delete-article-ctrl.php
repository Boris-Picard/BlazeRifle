<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';


try {
    // Récupération de l'ID de l'article à supprimer depuis les paramètres de l'URL
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

    // Récupération des détails de l'article à supprimer
    $article = Article::get($id_article);

    // Tentative de suppression de l'article
    $isDeleted = Article::delete($id_article);

    // Si la suppression a réussi, tenter de supprimer le fichier associé à l'article
    if ($isDeleted > 0) {
        $link = unlink('../../../public/uploads/article/' . $article->article_picture);
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des articles du tableau de bord
    header('Location: /controllers/dashboard/articles/list-articles-ctrl.php');
    die;
} catch (PDOException $e) {
    $_SESSION['msg'] = $e->getMessage();
    header('Location: /controllers/dashboard/articles/list-articles-ctrl.php');
    die;
}






include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/list-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
