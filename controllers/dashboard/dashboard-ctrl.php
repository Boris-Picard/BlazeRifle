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
    $users = User::getAll(nbUsers: 6);

    $pastUsers = User::pastUsers();
    $newUsers = User::newUser();

    $calcNewUsers = $newUsers; 
    $calcPastUsers = $pastUsers; 

    if ($calcPastUsers > 0) {
        $growth = (($calcNewUsers - $calcPastUsers) / $calcPastUsers) * 100;
    } else {
        $growth = 100; // Si aucune inscription n'a eu lieu la semaine précédente, considérez la croissance comme étant de 100%.
    }

    $growFromWeek = $growth;

} catch (PDOException $e) {
    'Erreur : ' . $e->getMessage();
}



include __DIR__ . '/../../views/templates/header-dashboard.php';
include __DIR__ . '/../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../views/dashboard/dashboard.php';
include __DIR__ . '/../../views/templates/footer-dashboard.php';
