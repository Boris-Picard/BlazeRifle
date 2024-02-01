<?php

require_once __DIR__ . '/../../../models/Console.php';


try {
    // $consoles = Console::getAll();



} catch (PDOException $e) {
    $error = $e->getMessage();
    die;
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/consoles/list-consoles.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';