<?php
require_once __DIR__ . '/../../models/User.php';

try {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $isConfirmed = User::confirm($email);
} catch (\Throwable $th) {
    $th->getMessage();
}