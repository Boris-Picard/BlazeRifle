<?php
session_start();
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listComments = true;

try {
    $id_comment = filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT);
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbComments = intval(filter_input(INPUT_GET, 'nbComments', FILTER_SANITIZE_NUMBER_INT));

    $nbCommentsToUse = !empty($nbComments) ? $nbComments : 100;
    
    $comments = Comment::getAll(order: $order, nbComments: $nbCommentsToUse);

    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if (isset($id_comment)) {
        Comment::confirm($id_comment);
        header('location: /controllers/dashboard/comments/list-comments-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/comments/list-comments.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
