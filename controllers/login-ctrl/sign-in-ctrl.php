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
        if (empty($password)) {
            $error['password'] = 'Veuillez entrer un mot de passe';
        } else {
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isOk) {
                $error['password'] = "Veuillez entrer un mot de passe valide";
            }
        }

        if (empty($error)) {
            $user = User::getUserMail($email);
            if (!$user) {
                $error['email'] = '';
            } else {
                $paswordHash = $user->password();
                $isAuth = password_verify($isOk, $paswordHash);
                if ($isAuth) {
                    unset($user->password);
                    $_SESSION['user'] = $user;
                }
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

















include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/login/sign-in.php';
