<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';


try {
    
    $id_event = intval(filter_input(INPUT_GET, 'id_event', FILTER_SANITIZE_SPECIAL_CHARS));
    
    $isDeleted = Event::delete($id_event);

    if($isDeleted > 0) {
        $link = unlink('../../../public/uploads/event/'.$event->event_picture);
    }

    if($isDeleted) {
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur la donnée n\'a pas été supprimée !';
    }

    header('Location: /controllers/dashboard/events/list-events-ctrl.php');
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/list-events.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';