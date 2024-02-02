<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Article.php';


try {
    // Récupérer les ID de l'article et du jeu depuis la requête GET
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer les détails de l'article
    $article = Article::get($id_article, $id_console);

    // Vérifier si l'article existe
    if (!empty($article)) {
        // Formater la date et l'heure de création de l'article
        $timestamp = strtotime($article->created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d/m/Y', $timestamp);
    } else {
        // Rediriger vers la liste des articles si l'article n'existe pas
        header('Location: /controllers/articles-list/articles-ctrl.php?id_game=' . $id_game);
        die;
    }

    // Récupérer les trois derniers articles du même jeu pour afficher en bas de page
    $articles = Article::getAll($id_game, false, 'DESC', limit: 3);

    // Gérer le formulaire de commentaire s'il est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $textAreaComment = filter_input(INPUT_POST, 'textAreaComment', FILTER_SANITIZE_SPECIAL_CHARS);

        // Valider le champ de commentaire
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
} catch (PDOException $e) {
    // Capturer toute exception PDO et afficher un message d'erreur
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles/article.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
