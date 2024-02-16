<?php
session_start();
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listUsers = true;
try {
    // Récupération des paramètres depuis l'URL
    $id_user = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbUsers = intval(filter_input(INPUT_GET, 'nbUsers', FILTER_SANITIZE_NUMBER_INT));

    $nbUsersToUse = !empty($nbUsers) ? $nbUsers : 100;

    // Récupération de la liste des articles en fonction des paramètres
    $users = User::getAll(true, $order, $nbUsersToUse);

    $user = User::get($id_user);
    // Si l'article spécifié existe
    if ($user) {
        User::archive($id_user, true);
        header('location: /controllers/dashboard/users/users-list-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    die('Erreur ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/archive-user.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
