<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    $listArticles = true;
    $addArticle = true;
    // Récupération de la liste de tous les jeux
    $games = Game::getAll();

    // Récupération de la liste de toutes les catégories
    $categories = Category::getAll();

    $id_user = $_SESSION['user']->id_user;
    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage et validation du titre de l'article et validation
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            // Validation de la longueur du titre
            if (strlen($title) < 10 || strlen($title) > 200) {
                $error['title'] = 'La longueur du titre n\'est pas valide';
            }
        }

        // Nettoyage et validation de la description de l'article et validation
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // Validation de la longueur de la description
            if (strlen($description) < 50 || strlen($description) > 1000) {
                $error["description"] = 'La longueur de la description doit faire minimum 50 caractères et maximum 1000 caractères';
            }
        }

        // Nettoyage et validation du premier sous-titre de l'article et validation
        $secondTitle = filter_input(INPUT_POST, 'secondTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondTitle)) {
            $error['secondTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // Validation de la longueur du sous-titre
            if (strlen($secondTitle) < 10 || strlen($secondTitle) > 200) {
                $error['secondTitle'] = 'La longueur du sous-titre n\'est pas valide';
            }
        }

        // Nettoyage et validation du deuxième sous-titre de l'article et validation
        $thirdTitle = filter_input(INPUT_POST, 'thirdTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($thirdTitle)) {
            $error['thirdTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // Validation de la longueur du sous-titre
            if (strlen($thirdTitle) < 10 || strlen($thirdTitle) > 200) {
                $error['thirdTitle'] = 'La longueur du sous-titre n\'est pas valide';
            }
        }

        // Nettoyage et validation de la première section de l'article et validation
        $firstSection = filter_input(INPUT_POST, 'firstSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstSection)) {
            $error['firstSection'] = 'Veuillez rentrer une section d\'article';
        } else {
            // Validation de la longueur de la première section
            if (strlen($firstSection) < 250 || strlen($firstSection) > 5000) {
                $error['firstSection'] = 'La longueur du texte de la première section n\'est pas correcte';
            }
        }

        // Nettoyage et validation de la deuxième section de l'article et validation
        $secondSection = filter_input(INPUT_POST, 'secondSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondSection)) {
            $error['secondSection'] = 'Veuillez rentrer une deuxième section d\'article';
        } else {
            // Validation de la longueur de la deuxième section
            if (strlen($secondSection) < 250 || strlen($secondSection) > 5000) {
                $error['secondSection'] = 'La longueur du texte de la deuxième section n\'est pas correcte';
            }
        }

        // Récupération des IDs des jeux pour la validation du select
        $gamesId = array_column($games, 'id_game');
        $categoryId = array_column($categories, 'id_category');

        $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_category)) {
            $error['id_category'] = 'Veuillez sélectionner une catégorie';
        } else {
            if (!in_array($id_category, $categoryId)) {
                $error['id_category'] = 'Ce n\'est pas une catégorie';
            }
        }

        // Nettoyage du select du jeu et validation
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }



        // Nettoyage et validation de la photo de l'article et validation
        try {
            // Vérification de l'existence de la photo
            if (empty($_FILES['picture']['name'])) {
                throw new Exception("Photo obligatoire");
            }
            // Vérification d'éventuelles erreurs lors du téléchargement du fichier
            if ($_FILES['picture']['error'] != 0) {
                throw new Exception("Error");
            }
            // Vérification du format de la photo
            if (!in_array($_FILES['picture']['type'], IMAGE_TYPES)) {
                throw new Exception("Format non autorisé");
            }
            // Vérification de la taille de la photo
            if ($_FILES['picture']['size'] > MAX_FILESIZE) {
                throw new Exception("Image trop grande");
            }

            // Génération d'un nom de fichier unique
            $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('img_') . '.' . $extension;

            // Déplacement du fichier téléchargé vers le répertoire de destination
            $from = $_FILES['picture']['tmp_name'];
            $to =  __DIR__ . '/../../../public/uploads/article/' . $fileName;

            if (empty($error)) {
                $moveFile = move_uploaded_file($from, $to);
            }
        } catch (\Throwable $e) {
            $error['picture'] = $e->getMessage();
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        //Condition pour vérifier si la donnée dans la colonne 'article_title' existe déjà ou non. Si c'est vrai, bloquer l'envoi de la donnée.
        if (Article::isExist($title)) {
            $error['isExist'] = 'Article déjà existant';
            $alert['error'] = 'Article déjà existant';
        }

        // Si il n'y a pas d'erreurs, j'hydrate les attributs de la classe Article
        if (empty($error)) {

            $article = new Article();

            $article->setArticleTitle($title);
            $article->setSecondTitle($secondTitle);
            $article->setThirdTitle($thirdTitle);
            $article->setArticlePicture($fileName);
            $article->setArticleDescription($description);
            $article->setFirstSection($firstSection);
            $article->setSecondSection($secondSection);
            $article->setIdCategory($id_category);
            $article->setIdUser($id_user);
            $article->setIdGame($id_game);

            // Insertion de l'article et validation dans la base de données
            $result = $article->insert();

            // Si l'insertion a réussi, affichage d'un message de succès et redirection
            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-articles-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    $alert['error'] = $e->getMessage();
}




include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/add-article.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
