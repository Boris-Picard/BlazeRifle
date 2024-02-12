<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    $listArticles = true;

    // Récupération de l'identifiant de l'article depuis la requête GET
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de l'article correspondant à l'identifiant
    $article = Article::get($id_article);

    $id_user = $article->id_user;


    $categories = Category::getAll();

    // Récupération de la liste de tous les jeux et consoles
    $games = Game::getAll();

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

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

        $fileName = $article->article_picture;

        // Nettoyage et validation de la photo de l'article et validation
        if (empty($fileName)) {
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
        }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // Vérification de l'existence d'un titre avec le même nom.
        // Si le titre existe déjà dans la base de données et n'est pas celui du titre actuel, déclencher une erreur.
        if (Article::isExist($title) && $title != $article->article_title) {
            $error['isExist'] = 'Article déjà existant';
            $alert['error'] = 'Article déjà existant';
        }

        // Si aucune erreur, hydratation des attributs de la classe Article
        if (empty($error)) {
            $article = new Article();

            $article->setArticleTitle($title);
            $article->setSecondTitle($secondTitle);
            $article->setThirdTitle($thirdTitle);
            $article->setArticlePicture($fileName);
            $article->setArticleDescription($description);
            $article->setFirstSection($firstSection);
            $article->setSecondSection($secondSection);
            $article->setIdGame($id_game);
            $article->setIdArticle($id_article);
            $article->setIdUser($id_user);

            // Mise à jour de l'article dans la base de données
            $result = $article->update();

            // Si la mise à jour réussit, affichage d'un message de succès et redirection
            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-articles-ctrl.php');
            }
        }

        // Récupération de l'article après la mise à jour
        $article = Article::get($id_article);
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
    die;
}






include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/update-article.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
