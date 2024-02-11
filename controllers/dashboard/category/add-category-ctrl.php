<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listCategories = true;

try {
    // Vérification si la méthode de requête est POST pour traiter les données du formulaire
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyage et récupération du nom de la catégorie depuis le formulaire
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du nom de la catégorie : non vide et conforme à une expression régulière
        if (empty($name)) {
            $error['name'] = 'Veuillez entrer un nom de catégorie';
        } else {
            // Validation supplémentaire avec une expression régulière pour le format du nom
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['name'] = 'Veuillez entrer une catégorie valide !';
            }
        }

        // Gestion des erreurs et affichage des messages d'alerte
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Si pas d'erreur, procédure d'insertion de la catégorie
        if (empty($error)) {
            $category = new Category();
            $category->setLabel($name);
            $result = $category->insert();

            // Vérification du succès de l'insertion et redirection
            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-categories-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/category/add-category.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
