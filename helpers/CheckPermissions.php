<?php

class CheckPermissions
{
    public static function checkAdmin()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']->role != 1) {
            header('location: /controllers/home-ctrl.php');
            exit;
        }
    }

    public static function checkMemberEditor()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']->role != 2) {
            header('location: /controllers/account/account-ctrl.php');
            exit;
        }
    }

    public static function checkMember()
    {
        if (empty($_SESSION['user'])) {
            header('location: /controllers/home-ctrl.php');
            exit;
        }
    }
    
}
