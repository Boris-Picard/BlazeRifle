<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';


try {
    // Récupération de l'identifiant de l'événement à supprimer depuis les paramètres de la requête
    $id_event = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_SPECIAL_CHARS));
    
    // Récupération de l'événement à supprimer depuis la base de données
    $event = Event::get($id_event);

    // Tentative de suppression de l'événement
    $isDeleted = Event::delete($id_event);

    // Si l'événement a été supprimé avec succès
    if($isDeleted > 0) {
        // Suppression du fichier image associé à l'événement
        $link = unlink('../../../public/uploads/events/'.$event->event_picture);
    }

    // Vérification si la suppression a réussi
    if($isDeleted) {
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des événements dans le tableau de bord
    header('Location: /controllers/dashboard/events/list-events-ctrl.php');
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}






include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/list-events.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';