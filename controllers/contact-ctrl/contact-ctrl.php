<?php
session_start();
require_once __DIR__ . '/../../models/Contact.php';
require_once __DIR__ . '/../../config/config.php';


try {
    $activeContact = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //===================== Firstname : Nettoyage et validation =======================
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        // On vérifie que ce n'est pas vide
        if (empty($firstname)) {
            $error["firstname"] = "Vous devez entrer un prénom";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_FIRSTNAME . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["firstname"] = "Le prénom n'est pas au bon format";
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
            }
        }
        //===================== email : Nettoyage et validation =======================
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (empty($email)) {
            $error["email"] = "L'adresse mail est obligatoire";
        } else {
            $testEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$testEmail) {
                $error["email"] = "L'adresse email n'est pas au bon format";
            }
        }
        // TEXTAREA
        $textArea = filter_input(INPUT_POST, 'textArea', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($textArea)) {
            $error['textArea'] = 'Veuillez mettre un commentaire';
        } else {
            $isOk = filter_var($textArea, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["textArea"] = "Le nom n'est pas au bon format";
            }
            if(strlen($textArea) > 500) {
                $error['textArea'] = 'Votre message est trop long';
            }
        }
        // CHECKBOX
        $checkbox = filter_input(INPUT_POST, 'checkboxForm', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($checkbox)) {
            $error['checkboxForm'] = "Veuillez accepter";
        }

        if (empty($error)) {
            $message = new Contact();

            $message->setFirstname($firstname);
            $message->setLastname($lastname);
            $message->setEmail($email);
            $message->setDescription($textArea);

            $result = $message->insert();
        } else {
            $result = false;
        }
    }
} catch (PDOException $e) {
    $error['global'] = 'Erreur : ' . $e->getMessage();
    $result = false;
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/contact/contact.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
