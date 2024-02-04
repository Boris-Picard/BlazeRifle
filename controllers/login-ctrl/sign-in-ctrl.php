<?php
require_once __DIR__ . '/../../config/config.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            } else {
                $hash = password_hash($isOk, PASSWORD_DEFAULT);
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

















include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/login/sign-in.php';
