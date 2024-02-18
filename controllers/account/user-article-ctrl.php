<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Category.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/CheckPermissions.php';

CheckPermissions::checkMemberEditor();


try {
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
    
    $userArticle = true;
    // Récupération de la liste de tous les jeux
    $gamesArticle = Game::getAll();
    // Récupération de la liste de toutes les catégories
    $categories = Category::getAll();

    $id_user = intval(filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT));
    $user = User::get($id_user);
    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage et validation du titre de l'article et validation
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            if (!$isOk) {
                $error['title'] = 'Veuillez renseigner un titre de jeu correct';
            }
        }

        // Nettoyage et validation de la description de l'article et validation
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // Validation de la longueur de la description
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            if (!$isOk) {
                $error['description'] = 'Veuillez renseigner une description de jeu correct';
            }
            if (strlen($description) > 500) {
                $error['description'] = 'Votre message est trop long';
            }
        }

        // Nettoyage et validation du premier sous-titre de l'article et validation
        $secondTitle = filter_input(INPUT_POST, 'secondTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondTitle)) {
            $error['secondTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            $isOk = filter_var($secondTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            if (!$isOk) {
                $error['secondTitle'] = 'Veuillez renseigner un titre de jeu correct';
            }
        }

        // Nettoyage et validation du deuxième sous-titre de l'article et validation
        $thirdTitle = filter_input(INPUT_POST, 'thirdTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($thirdTitle)) {
            $error['thirdTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            $isOk = filter_var($thirdTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            if (!$isOk) {
                $error['thirdTitle'] = 'Veuillez renseigner un titre de jeu correct';
            }
        }

        // Nettoyage et validation de la première section de l'article et validation
        $firstSection = filter_input(INPUT_POST, 'firstSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstSection)) {
            $error['firstSection'] = 'Veuillez rentrer une section d\'article';
        } else {
            $isOk = filter_var($firstSection, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SECTION . '/')));
            if (!$isOk) {
                $error['firstSection'] = 'Veuillez renseigner un titre de jeu correct';
            }
            if (strlen($firstSection) > 5000) {
                $error['firstSection'] = 'Votre message est trop long';
            }
        }

        // Nettoyage et validation de la deuxième section de l'article et validation
        $secondSection = filter_input(INPUT_POST, 'secondSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondSection)) {
            $error['secondSection'] = 'Veuillez rentrer une deuxième section d\'article';
        } else {
            $isOk = filter_var($secondSection, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SECTION . '/')));
            if (!$isOk) {
                $error['secondSection'] = 'Veuillez renseigner un titre de jeu correct';
            }
            if (strlen($secondSection) > 5000) {
                $error['secondSection'] = 'Votre message est trop long';
            }
        }

        // Récupération des IDs des jeux pour la validation du select
        $gamesId = array_column($gamesArticle, 'id_game');
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

            $to =  __DIR__ . '/../../public/uploads/article/' . $fileName;
            $moveFile = move_uploaded_file($from, $to);

            $image = imagecreatefromjpeg($to);

            $width = 900;
            $height = -1;

            $mode = IMG_BICUBIC;

            $resampledObject = imagescale($image, $width, $height, $mode);
            imagejpeg($resampledObject, $to);
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
                header("Refresh:8;url=/controllers/account/account-ctrl.php?id_user=".$user->id_user);
            }
        }
    }
} catch (PDOException $e) {
    $alert['error'] = $e->getMessage();
    die;
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/account/user-article.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
