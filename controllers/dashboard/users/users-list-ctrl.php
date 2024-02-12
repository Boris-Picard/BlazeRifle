<?php
session_start();
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listUsers = true;

try {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    $users = User::getAll();

    if (isset($email)) {
        User::confirm($email);
    }
} catch (PDOException $e) {
    die('Erreur ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/users-list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
