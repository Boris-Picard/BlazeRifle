<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';

try {
    $id_vent = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_NUMBER_INT));

    $event = Event::get($id_vent);

    if($event->event_picture) {
        $link = unlink('../../../public/uploads/article/'.$event->event_picture);
        $deleteImg = Article::updateImg($id_vent);
    }

    if($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }
    
    header('Location: /controllers/dashboard/events/update-event-ctrl.php?id='.$event->id_event);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/update-event.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';