<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';


try {
    $listEvents = true;
    
    $events = Event::getAll();

    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/list-events.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';