<?php
session_start();
require_once __DIR__ . '/../../../models/Console.php';


try {
    // Récupération de l'identifiant de l'événement à supprimer depuis les paramètres de la requête
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_SPECIAL_CHARS));

    // Récupération de l'événement à supprimer depuis la base de données
    $console = Console::get($id_console);

    // Tentative de suppression de l'événement
    $isDeleted = Console::delete($id_console);

    // Si l'événement a été supprimé avec succès
    if ($isDeleted > 0) {
        $link = unlink('../../../public/uploads/consoles/' . $console->console_picture);
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des événements dans le tableau de bord
    header('Location: /controllers/dashboard/consoles/list-consoles-ctrl.php');
    die;
} catch (PDOException $e) {
    $_SESSION['msg'] = $e->getMessage();
    header('Location: /controllers/dashboard/consoles/list-consoles-ctrl.php');
    die;
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/consoles/list-consoles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
