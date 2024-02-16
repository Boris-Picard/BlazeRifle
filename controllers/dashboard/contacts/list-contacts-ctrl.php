<?php
session_start();
require_once __DIR__ . '/../../../models/Contact.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listContacts = true;

try {
    $order = filter_input(INPUT_GET, 'order', FILTER_SANITIZE_SPECIAL_CHARS);
    $nbContacts = intval(filter_input(INPUT_GET, 'nbContacts', FILTER_SANITIZE_NUMBER_INT));
var_dump($order);
    $nbContactsToUse = !empty($nbContacts) ? $nbContacts : 100;

    $messages = Contact::getAll($order, $nbContactsToUse);
    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/contacts/list-contacts.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
