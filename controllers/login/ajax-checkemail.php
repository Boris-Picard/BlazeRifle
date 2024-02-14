<?php
require_once __DIR__ . '/../../models/User.php';


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$result = User::getUserMail($email);
if($result) {
    $result = true;
}
echo json_encode($result);