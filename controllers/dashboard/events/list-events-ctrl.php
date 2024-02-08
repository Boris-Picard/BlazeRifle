<?php
session_start();
require_once __DIR__ . '/../../../models/Event.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    $listEvents = true;
    
    // Récupération de tous les événements depuis la base de données
    $events = Event::getAll();

    // Récupération du message stocké en session (s'il existe) et nettoyage de la session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message de la session après récupération
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