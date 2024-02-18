<?php
session_start();
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMember();

try {
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $user = User::get($id_user);

    $timestamp = strtotime($user->user_created_at);
    $user->formattedHour = date('H:i:s', $timestamp);
    $user->formattedDate = date('d-m-Y', $timestamp);

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    die('Erreur account : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/account.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
