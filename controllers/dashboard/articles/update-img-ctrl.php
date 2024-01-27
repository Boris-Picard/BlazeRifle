<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';

try {
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $article = Article::get($id_article);

    if($article->picture) {
        $link = unlink('../../../public/uploads/article/'.$article->picture);
        $deleteImg = Article::updateImg($id_article);
    }

    if($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }
    
    header('Location: /controllers/dashboard/articles/update-article-ctrl.php?id='.$article->id_article);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/update-article.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';