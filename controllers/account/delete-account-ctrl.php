<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Comment.php';
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
        $password = filter_input(INPUT_POST, 'password');
        if (empty($password)) {
            $error['password'] = 'Veuillez entrer un mot de passe';
        } else {
            $passwordOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
            if (!$passwordOk) {
                $error['password'] = "Veuillez entrer un mot de passe valide";
            }

            if (empty($error)) {
                // Récupère le hash du mot de passe actuel de l'utilisateur
                $currentPasswordHash = $user->password;

                // Vérifie que l'ancien mot de passe est correct
                $isOldPasswordCorrect = password_verify($passwordOk, $currentPasswordHash);
                if ($isOldPasswordCorrect) {
                    if ($user->user_picture !== 'profilpicdefault.avif') {
                        unlink('../../public/uploads/users/' . $user->user_picture);
                    }
                    Comment::deleteCommentsUser($id_user);
                    User::delete($id_user);
                    unset($_SESSION['user']);
                    header('location: /controllers/home-ctrl.php');
                } else {
                    $error['password'] = 'Le mot de passe n\'est pas correct';
                }
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/delete-account.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
