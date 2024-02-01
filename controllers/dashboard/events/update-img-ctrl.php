<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';

try {
    // Récupération de l'identifiant de l'événement depuis la requête
    $id_event = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de l'événement spécifié par l'identifiant
    $event = Event::get($id_event);

    // Vérification si l'événement a une photo associée
    if ($event->event_picture) {
        // Suppression du lien vers la photo dans le répertoire d'uploads
        $link = unlink('../../../public/uploads/events/' . $event->event_picture);

        // Mise à jour du champ de la photo dans la base de données
        $deleteImg = Event::updateImg($id_event);
    }

    // Vérification du résultat de la suppression de la photo
    if ($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur, l\'image n\'a pas été supprimée !';
    }

    // Redirection vers la page de mise à jour de l'événement avec un message
    header('Location: /controllers/dashboard/events/update-event-ctrl.php?id_event=' . $event->id_event);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/update-event.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';