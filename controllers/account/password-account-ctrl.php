<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMember();

try {
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
    
    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $user = User::get($id_user);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $oldPassword = filter_input(INPUT_POST, 'oldPassword');
        if (empty($oldPassword)) {
            $error['oldPassword'] = 'Veuillez entrer un mot de passe';
        } else {
            $isOldPasswordOk = filter_var($oldPassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$isOldPasswordOk) {
                $error['oldPassword'] = "Veuillez entrer un mot de passe valide";
            }

            $password = filter_input(INPUT_POST, 'password');
            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
            if (empty($password)) {
                $error['password'] = 'Veuillez entrer un mot de passe';
            } elseif (empty($confirmPassword)) {
                $error['confirmPassword'] = 'Veuillez confirmer le mot de passe';
            } elseif ($password !== $confirmPassword) {
                $error['confirmPassword'] = 'Les mots de passe ne correspondent pas';
            } else {
                $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
                if (!$isOk) {
                    $error['password'] = "Veuillez entrer un mot de passe valide";
                }
            }
            
            if (empty($error)) {
                // Récupère le hash du mot de passe actuel de l'utilisateur
                $currentPasswordHash = $user->password;

                // Vérifie que l'ancien mot de passe est correct
                $isOldPasswordCorrect = password_verify($isOldPasswordOk, $currentPasswordHash);
                if ($isOldPasswordCorrect) {
                    // Si l'ancien mot de passe est correct, hash le nouveau mot de passe
                    $newPasswordHash = password_hash($isOk, PASSWORD_DEFAULT);

                    // Met à jour le mot de passe de l'utilisateur
                    User::updatePassword($newPasswordHash, $id_user);
                    header("Refresh:7;url=/controllers/account/account-ctrl.php?id_user=".$user->id_user);
                } else {
                    $error['oldPassword'] = 'L\'ancien mot de passe n\'est pas correct';
                }
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/password-account.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
