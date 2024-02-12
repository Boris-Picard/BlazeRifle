<?php
session_start();
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

try {
    // Récupération de l'ID de la console à mettre à jour depuis les paramètres de l'URL
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des détails de la console à mettre à jour
    $console = User::get($id_user);

    // Si l'article a une image associée
    if ($user->user_picture) {
        if ($user->user_picture !== 'profilpicdefault.avif') {
            $link = unlink('../../../public/uploads/users/' . $user->user_picture);
        }
        // Mise à jour du champ image dans la base de données
        $deleteImg = User::updateImg($id_user);
    }

    // Gestion des messages de session en fonction du succès ou de l'échec de la suppression d'image
    if ($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur : l\'image n\'a pas été supprimée !';
    }

    // Redirection vers le contrôleur de mise à jour de la console avec l'ID de la console
    header('Location: /controllers/dashboard/users/update-user-ctrl.php?id_user=' . $id_user);
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/update-user.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
