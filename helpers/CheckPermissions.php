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
}
