<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Article.php';


try {

    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $article = Article::get($id_article);
    // var_dump($article);
    // die;

    $timestamp = strtotime($article->created_at);
    $article->formattedHour = date('H:i', $timestamp);
    $article->formattedDate = date('d/m/Y', $timestamp);

    $articles = Article::getAll();

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}








if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $textAreaComment = filter_input(INPUT_POST, 'textAreaComment', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($textAreaComment)) {
        $error['textAreaComment'] = 'Veuillez écrire un commentaire';
    } else {
        if (strlen($textAreaComment) > 1500) {
            $error['textAreaComment'] = 'Veuillez ne pas dépasser les 1500 caractères';
        }
        if (strlen($textAreaComment) < 20) {
            $error['textAreaComment'] = 'Veuillez écrire plus de 20 caractères';
        }
    }
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles/article.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
