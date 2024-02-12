<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();
$listUsers = true;

try {
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));

    $user = User::get($id_user);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstname)) {
            $error['firstname'] = 'Veuillez entrer un prénom';
        } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isOk) {
                $error['firstname'] = 'Veuillez entrer un prénom valide';
            }
        }

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($lastname)) {
            $error["lastname"] = "Vous devez entrer un nom";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FIRSTNAME . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["lastname"] = "Le nom n'est pas au bon format";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom n'est pas bon";
                }
            }
        }
        
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($pseudo)) {
            $error["pseudo"] = "Vous devez entrer un pseudo";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($pseudo, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PSEUDO . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["pseudo"] = "Le pseudo n'est pas au bon format";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($pseudo) < 3 || strlen($pseudo) > 20) {
                    $error["pseudo"] = "La longueur du pseudo n'est pas bon";
                }
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/users/update-user.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
