<?php
// session_start();
require_once __DIR__ . '/../../../models/Event.php';


try {
    $listEvents = true;
    
    $events = Event::getAll(true);

    // $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
    // $article = Event::get($id_article);

    // if($article) {
    //     Event::archive($id_article, false);
    //     header('location: /controllers/dashboard/articles/list-articles-ctrl.php');
    // }

    // $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // if(isset($_SESSION['msg'])) {
    //     unset($_SESSION['msg']);
    // }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/events/list-events.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';