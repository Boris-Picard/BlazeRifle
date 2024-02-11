<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listCategories = true;

try {
    // Récupération et nettoyage de l'identifiant de la catégorie depuis l'URL.
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations de la catégorie à partir de son identifiant.
    $category = Category::get($id_category);

    // Vérification si la méthode de la requête est POST pour traiter la soumission du formulaire.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyage et récupération du nouveau nom de catégorie depuis le formulaire.
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du nom de catégorie : vérification qu'il n'est pas vide et qu'il respecte une expression régulière.
        if (empty($name)) {
            $error['name'] = 'Veuillez entrer un nom de catégorie';
        } else {
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['name'] = 'Veuillez entrer une catégorie valide !';
            }
        }

        // Gestion des erreurs et affichage des alertes si nécessaire.
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Si aucune erreur, mise à jour de la catégorie avec les nouvelles informations.
        if (empty($error)) {
            $category = new Category();

            $category->setLabel($name);
            $category->setIdCategory($id_category);

            // Exécution de la mise à jour et vérification du résultat.
            $result = $category->update();

            // Si la mise à jour est réussie, affichage d'une alerte de succès et redirection.
            if ($result) {
                $alert['success'] = 'La donnée a bien été mise à jour ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-categories-ctrl.php');
            }
        }

        // Rechargement des informations de la catégorie après la mise à jour.
        $category = Category::get($id_category);
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/category/update-category.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
?>
