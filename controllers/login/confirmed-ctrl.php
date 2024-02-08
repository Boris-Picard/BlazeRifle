<?php
session_start();
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/JWT.php';

try {
    $jwt = filter_input(INPUT_GET, 'jwt');
    $verifyToken = JWT::verifyToken($jwt);
    var_dump($verifyToken);
    die;
    // if ($verifyToken && $verifyToken['userMail'] == $jwt) {
    //     $isConfirmed = User::confirm($jwt);
    //     header("Refresh:7;url=/controllers/login/sign-in-ctrl.php");
    // } else {
    //     header("Refresh:3;url=/controllers/home-ctrl.php");
    // }
} catch (\Throwable $th) {
    $th->getMessage();
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/login/confirmed.php';
