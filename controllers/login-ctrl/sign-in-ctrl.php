<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

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
                $error['email'] = 'Entrer un mail valide';
            } else {
                $paswordHash = $user->password;
                $isAuth = password_verify($isOk, $paswordHash);
                if ($isAuth) {
                    unset($user->password);
                    $_SESSION['user'] = $user;
                } else {
                    $error['password'] = 'Entrer un mot de passe valide';
                }
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
// if (is_null($user->confirmed_at)) {
//     $error['email'] = 'Confimez le mail';
// } else {
//     unset($user->password);
//     $_SESSION['user'] = $user;
// }
















include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/login/sign-in.php';
