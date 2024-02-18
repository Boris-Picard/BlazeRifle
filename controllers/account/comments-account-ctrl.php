<?php
session_start();
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../helpers/Date_Comment.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMember();

$commentsAccount = true;

try {
    $alert = [];

    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $id_comment = intval(filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT));

    $user = User::get($id_user);

    $comments = Comment::getUserComments($id_user, 'DESC');

    $formatDate = Date_Comment::commentsDate($comments);

    $isDeleted = Comment::delete($id_comment);

    if ($isDeleted > 0) {
        $_SESSION['msg'] = 'Le commentaire a bien été supprimée !';
        header('location: /controllers/account/comments-account-ctrl.php?id_user=' . $id_user);
        die;
    }

} catch (PDOException $e) {
    die('Error comments : ' . $e->getMessage());
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/comments-account.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
