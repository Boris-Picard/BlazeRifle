<?php
session_start();
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listUsers = true;

try {
    $id_user = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
    $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_NUMBER_INT);
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbUsers = intval(filter_input(INPUT_GET, 'nbUsers', FILTER_SANITIZE_NUMBER_INT));

    $nbUsersToUse = !empty($nbUsers) ? $nbUsers : 100;

    $users = User::getAll(false, $order, $nbUsersToUse);

    $user = User::get($id_user);

    // Récupération et nettoyage du message de session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if (isset($confirm)) {
        User::confirm($confirm);
        header('location: /controllers/dashboard/users/users-list-ctrl.php');
        die;
    }

    if ($id_user) {
        User::archive($id_user, false);
        header('location: /controllers/dashboard/users/archive-user-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    die('Erreur ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/users-list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
