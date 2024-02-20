<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../helpers/Date_Comment.php';
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Comment.php';
require_once __DIR__ . '/../../models/User.php';

$articleView = true;

try {
    $comments = Comment::getAll(showConfirmedAt: true);
    Date_Comment::commentsDate($comments);

    // Récupérer les ID de l'article et du jeu depuis la requête GET
    $id_article = intval(filter_input(INPUT_GET, 'id_article', FILTER_SANITIZE_NUMBER_INT));
    $id_game = intval(filter_input(INPUT_GET, 'id_game', FILTER_SANITIZE_NUMBER_INT));
    $id_category = intval(filter_input(INPUT_GET, 'id_category', FILTER_SANITIZE_NUMBER_INT));

    //Récupération des IDs nettoyés. Si l'ID est égal à 0, alors je retourne la valeur null.
    $gameId = $id_game == 0 ? null : $id_game;
    $categoryId = $id_category == 0 ? null : $id_category;

    // Récupérer les détails de l'article
    $article = Article::get($id_article, true, $categoryId);

    // Vérifier si l'article existe
    if (!empty($article)) {
        // Formater la date et l'heure de création de l'article
        $timestamp = strtotime($article->article_created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d/m/y', $timestamp);
    } elseif($categoryId == REGEX_ARTICLES_GAMES || $categoryId == REGEX_GUIDES) {
        // Rediriger vers la liste des articles si l'article n'existe pas
        header('Location: /controllers/articles-list/articles-ctrl.php?id_game=' . $id_game . '&id_category=' . $id_category);
        die;
    } else {
        header('location: /controllers/tips-list/tips-ctrl.php');
        die;
    }

    // Récupération des articles pour les afficher dans la sidebar
    $articlesSidebar = Article::getAll($gameId, false, order: 'DESC', limit: 7, id_category: $categoryId, showConfirmedAt: true);
    Date_Comment::formatDateComment($articlesSidebar);
    $firstArticleSidebar = array_shift($articlesSidebar);

    // Récupération des trois derniers articles du même jeu pour afficher en bas de page
    $articlesBottom = Article::getAll($gameId, false, true, $categoryId, 'DESC', limit: 3);
    // Gérer le formulaire de commentaire s'il est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_user = $_SESSION['user']->id_user;

        if ($id_user !== $_SESSION['user']->id_user) {
            $error['user'] = 'Problème avec l\'utilisateur';
        }

        $textAreaComment = filter_input(INPUT_POST, 'textAreaComment', FILTER_SANITIZE_SPECIAL_CHARS);
        // Valider le champ de commentaire
        if (empty($textAreaComment)) {
            $error['textAreaComment'] = 'Veuillez écrire un commentaire';
        } else {
            $isOk = filter_var($textAreaComment, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            if (!$isOk) {
                $error['textAreaComment'] = 'Veuillez renseigner une description de jeu correct';
            }
            if (strlen($textAreaComment) > 500) {
                $error['textAreaComment'] = 'Votre message est trop long';
            }
        }

        if (empty($error)) {
            $comment = new Comment();

            $comment->setComment($textAreaComment);
            $comment->setIdArticle($id_article);
            $comment->setIdUser($id_user);

            $result = $comment->insert();

            if ($result > 0) {
                header("Refresh:8;url=/controllers/articles/article-ctrl.php?id_article=" . $id_article . '&id__game=' . $id_game . '&id_category=' . $id_category);
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/articles/article.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
