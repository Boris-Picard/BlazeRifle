<?php
require_once __DIR__ . '/../../../models/Article.php';


try {
    
    $articles = Article::getAll();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}













include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/article/list-article.php';