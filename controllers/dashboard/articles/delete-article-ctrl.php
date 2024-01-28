<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';


try {
    
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
    
    $isDeleted = Article::delete($id_article);

    if($isDeleted > 0) {
        $link = unlink('../../../public/uploads/article/'.$article->picture);
    }

    if($isDeleted) {
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }

    header('Location: /controllers/dashboard/articles/list-articles-ctrl.php');
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/list-articles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';