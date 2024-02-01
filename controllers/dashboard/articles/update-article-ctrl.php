<?php
session_start();
require_once __DIR__ . '/../../../models/Article.php';
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console.php';


try {
    $listArticles = true;

    // Récupération de l'identifiant de l'article depuis la requête GET
    $id_article = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupération de l'article correspondant à l'identifiant
    $article = Article::get($id_article);

    // Récupération de la liste de tous les jeux et consoles
    $games = Game::getAll();
    $consoles = Console::getAll();

    // Récupération du message stocké en session
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session s'il existe
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    // Vérification si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Nettoyage du titre de l'article
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            // Validation de la longueur du titre
            if (strlen($title) < 10 || strlen($title) > 200) {
                $error['title'] = 'La longueur du titre n\'est pas valide';
            }
        }

        $fileName = $article->article_picture;

        // Vérification si l'article a déjà une image, sinon tentative de téléchargement
        if (empty($fileName)) {
            try {
                if (empty($_FILES['image-article']['name'])) {
                    throw new Exception("Photo obligatoire");
                }
                if ($_FILES['image-article']['error'] != 0) {
                    throw new Exception("Error");
                }
                if (!in_array($_FILES['image-article']['type'], IMAGE_TYPES)) {
                    throw new Exception("Format non autorisé");
                }
                if ($_FILES['image-article']['size'] > MAX_FILESIZE) {
                    throw new Exception("Image trop grande");
                }

                // Génération d'un nom de fichier unique
                $extension = pathinfo($_FILES['image-article']['name'], PATHINFO_EXTENSION);
                $fileName = uniqid('img_') . '.' . $extension;

                // Déplacement du fichier téléchargé vers le répertoire de destination
                $from = $_FILES['image-article']['tmp_name'];
                $to =  __DIR__ . '/../../../public/uploads/article/' . $fileName;

                $moveFile = move_uploaded_file($from, $to);
            } catch (Throwable $th) {
                $error['image-article'] = $th->getMessage();
            }
        }

        // Nettoyage de la description de l'article
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // Validation de la longueur de la description
            if (strlen($description) < 50 || strlen($description) > 1000) {
                $error["description"] = 'La longueur de la description doit faire minimum 50 caractères et maximum 1000 caractères';
            }
        }

        // Nettoyage du premier sous-titre de l'article
        $secondTitle = filter_input(INPUT_POST, 'secondTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondTitle)) {
            $error['secondTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // Validation de la longueur du sous-titre
            if (strlen($secondTitle) < 10 || strlen($secondTitle) > 200) {
                $error['secondTitle'] = 'La longueur du sous-titre n\'est pas valide';
            }
        }

        // Nettoyage du deuxième sous-titre de l'article
        $thirdTitle = filter_input(INPUT_POST, 'thirdTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($thirdTitle)) {
            $error['thirdTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // Validation de la longueur du sous-titre
            if (strlen($thirdTitle) < 10 || strlen($thirdTitle) > 200) {
                $error['thirdTitle'] = 'La longueur du sous-titre n\'est pas valide';
            }
        }

        // Nettoyage de la première section de l'article
        $firstSection = filter_input(INPUT_POST, 'firstSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstSection)) {
            $error['firstSection'] = 'Veuillez rentrer une section d\'article';
        } else {
            // Validation de la longueur de la première section
            if (strlen($firstSection) < 250 || strlen($firstSection) > 5000) {
                $error['firstSection'] = 'La longueur du texte n\'est pas correcte';
            }
        }

        // Nettoyage de la deuxième section de l'article
        $secondSection = filter_input(INPUT_POST, 'secondSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondSection)) {
            $error['secondSection'] = 'Veuillez rentrer une deuxième section d\'article';
        } else {
            // Validation de la longueur de la deuxième section
            if (strlen($firstSection) < 250 || strlen($firstSection) > 5000) {
                $error['firstSection'] = 'La longueur du texte n\'est pas correcte';
            }
        }

        // Récupération des identifiants de jeux et de consoles
        $gamesId = array_column($games, 'id_game');
        $consolesId = array_column($consoles, 'id_console');

        // Nettoyage de l'identifiant du jeu
        $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_game)) {
            $error['id_game'] = 'Veuillez sélectionner un jeu';
        } else {
            // Validation de l'identifiant du jeu
            if (!in_array($id_game, $gamesId)) {
                $error['id_game'] = 'Ce n\'est pas un jeu valide';
            }
        }

        // Nettoyage de l'identifiant de la console
        $id_console = intval(filter_input(INPUT_POST, 'id_console', FILTER_SANITIZE_NUMBER_INT));

        if (empty($id_console)) {
            $error['id_console'] = 'Veuillez sélectionner une console';
        } else {
            // Validation de l'identifiant de la console
            if (!in_array($id_console, $gamesId)) {
                $error['id_console'] = 'Ce n\'est pas une console valide';
            }
        }

        // Vérification d'un auteur (commenté pour le moment)
        // $id_user = filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_SPECIAL_CHARS);

        // if (empty($id_user)) {
        //     $error['id_user'] = 'Veuillez rentrer un pseudo';
        // } else {
        //     $isOk = filter_var($id_user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        //     if (!$isOk) {
        //         $error['id_user'] = 'Le pseudo n\'est pas valide';
        //     }
        // }

        //Si le tableau d'erreurs n'est pas vide alors message d'erreur
        if(!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
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
            $article->setIdConsole($id_console);
            $article->setIdArticle($id_article);

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
