<?php
session_start();
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    // Récupération de l'identifiant de l'événement à supprimer depuis les paramètres de la requête
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de l'événement à supprimer depuis la base de données
    $user = User::get($id_user);

    // Tentative de suppression de l'événement
    $isDeleted = User::delete($id_user);

    // Si l'événement a été supprimé avec succès
    if ($isDeleted > 0) {
        if ($user->user_picture !== 'profilpicdefault.avif') {
            $link = unlink('../../../public/uploads/users/' . $user->user_picture);
        }
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des événements dans le tableau de bord
    header('Location: /controllers/dashboard/users/users-list-ctrl.php');
    die;
} catch (PDOException $e) {
    $_SESSION['msg'] = $e->getMessage();
    header('Location: /controllers/dashboard/users/users-list-ctrl.php');
    die;
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/users-list.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
