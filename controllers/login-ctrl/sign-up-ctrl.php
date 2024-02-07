<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

try {

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
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                    $error["firstname"] = "La longueur du prénom n'est pas bon";
                }
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
        //===================== MOT DE PASSE =====================
        $password = filter_input(INPUT_POST, 'password');
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
        if (empty($password)) {
            $error['password'] = 'Veuillez entrer un mot de passe';
        } elseif (empty($confirmPassword)) {
            $error['confirmPassword'] = 'Veuillez entrer un mot de passe';
        } else {
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            $isConfirmOk = filter_var($confirmPassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isOk && !$isConfirmOk) {
                $error['password'] = "Veuillez entrer un mot de passe valide";
            } elseif ($isOk != $isConfirmOk) {
                $error['confirmPassword'] = "Veuillez entrer le même mot de passe";
            }
        }
        // CHECKBOX
        $checkbox = filter_input(INPUT_POST, 'checkboxForm', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($checkbox)) {
            $error['checkboxForm'] = "Veuillez accepter";
        }

        if (empty($error)) {
            $passwordHash = password_hash($isOk, PASSWORD_DEFAULT);
            $user = new User();

            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setPseudo($pseudo);
            $user->setEmail($email);
            $user->setPassword($passwordHash);
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/login/sign-up.php';
