<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listCategories = true;

try {
    $categories = Category::getAll();
    
    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/category/list-categories.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
