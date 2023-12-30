<?php
include(dirname(__FILE__) . '/../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $textAreaComment = filter_input(INPUT_POST, 'textAreaComment', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($textAreaComment)) {
        $error['textAreaComment'] = 'Veuillez écrire un commentaire';
    } else {
        if(strlen($textAreaComment) > 1500) {
            $error['textAreaComment'] = 'Veuillez ne pas dépasser les 1500 caractères';
        } 
        if(strlen($textAreaComment) < 20) {
            $error['textAreaComment'] = 'Veuillez écrire plus de 20 caractères';
        }
    }
}



include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/templates/article.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
