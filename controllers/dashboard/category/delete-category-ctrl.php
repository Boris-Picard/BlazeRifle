<?php
session_start();
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    // Récupération de l'identifiant de la catégorie à supprimer depuis les paramètres de la requête
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));
    // Récupération de la catégorie à supprimer depuis la base de données
    $category = Category::get($id_category);

    // Tentative de suppression de la catégorie
    $isDeleted = Category::delete($id_category);

    // Si la catégorie a été supprimé avec succès
    if ($isDeleted > 0) {
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des catégories dans le tableau de bord
    header('Location: /controllers/dashboard/category/list-categories-ctrl.php');
    die;
} catch (PDOException $e) {
    $_SESSION['msg'] = $e->getMessage();
    header('Location: /controllers/dashboard/category/list-categories-ctrl.php');
    die;
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/category/list-categories.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
