<?php
session_start();
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


$dashboard = true;

try {
    $articles = Article::getAll(order: 'DESC', limit: 100);
    $comments = Comment::getAll();
    $users = User::getAll();

    $bottomComments = Comment::getAll(order: 'DESC', nbComments: 7);

} catch (PDOException $e) {
    'Erreur : ' . $e->getMessage();
}



include __DIR__ . '/../../views/templates/header-dashboard.php';
include __DIR__ . '/../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/templates/footer-dashboard.php';
