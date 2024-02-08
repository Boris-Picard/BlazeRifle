<?php
session_start();
require_once __DIR__ . '/../../../models/Console.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

try {
    // Récupération de l'ID de la console à mettre à jour depuis les paramètres de l'URL
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des détails de la console à mettre à jour
    $console = Console::get($id_console);

    // Si l'article a une image associée
    if ($console->console_picture) {
        // Tentative de suppression du fichier image associé
        $link = unlink('../../../public/uploads/consoles/' . $console->console_picture);

        // Mise à jour du champ image dans la base de données
        $deleteImg = Console::updateImg($id_console);
    }

    // Gestion des messages de session en fonction du succès ou de l'échec de la suppression d'image
    if ($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur : l\'image n\'a pas été supprimée !';
    }

    // Redirection vers le contrôleur de mise à jour de la console avec l'ID de la console
    header('Location: /controllers/dashboard/consoles/update-console-ctrl.php?id_console=' . $id_console);
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/console/update-console.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
