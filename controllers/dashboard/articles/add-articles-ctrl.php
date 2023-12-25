<?php
include(dirname(__FILE__) . '/../../../config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// TITLE INPUT
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($title)) {
        $error['title'] = "Veuillez Renseigner un titre";
    } else {
        if (strlen($title) < 10 || strlen($title) > 200) {
            $error["title"] = "La longueur du titre n'est pas bon";
        }
    }
// SELECT CONSOLE
$consoles = filter_input(INPUT_POST, 'consoles',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(empty($consoles)) {
        $error['consoles'] = 'Veuillez séléctionner une console';
    } elseif (!in_array($consoles,$consolesArray)) {
        $error['consoles'] = 'Ce n\'est pas une console valide';
    }
// SELECT GAMES
$games = filter_input(INPUT_POST, 'games',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if(empty($games)) {
        $error['games'] = 'Veuillez séléctionner un jeu';
    } elseif (!in_array($games,$gamesArray)) {
        $error['games'] = 'Ce n\'est pas un jeu valide';
    }
// TEXTAREA
$textArea = filter_input(INPUT_POST, 'textArea', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($textArea)) {
        $error['textArea'] = 'Veuillez écrire un article';
    } else {
        if(strlen($textArea) > 15000) {
            $error['textArea'] = 'Veuillez ne pas dépasser les 15000 caractères';
        } 
    }
// RESUME 
$resume = filter_input(INPUT_POST, 'resume', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($resume)) {
        $error['resume'] = "Veuillez écrire un résumé";
    } else {
        if (strlen($resume) < 10 || strlen($resume) > 1000) {
            $error["resume"] = "La longueur du résumé n'est pas bon";
        }
    }
// AUTHOR
$author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($author)) {
        $error['author'] = "Veuillez renseigner un auteur";
    }
// FILE
try {

    if (!isset($_FILES['media'])) {
        throw new Exception("Le champ media n'existe pas");
    }

    if ($_FILES['media']['error'] != 0) {
        throw new Exception("Une erreur est survenue lors du transfert");
    }

    if ($_FILES['media']['type'] != 'image/png') {
        throw new Exception("Ce fichier n'est pas au bon format");
    }

    if ($_FILES['media']['size'] > MAX_FILESIZE) {
        throw new Exception("Ce fichier est trop volumineux");
    }

    // Upload de l'image sur le serveur dans le bon dossier
    $from = $_FILES['media']['tmp_name'];
    $extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
    $filename = uniqid('media_') . '.' . $extension;
    $to = __DIR__ . '/../../../public/uploads/users/' . $filename;
    move_uploaded_file($from, $to);

} catch (\Throwable $th) {
    $error['media'] = $th->getMessage();
}
}


include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard/articles/add-articles.php';
include __DIR__ . '/../../../views/templates/footer.php';