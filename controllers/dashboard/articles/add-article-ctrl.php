<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Article.php';


try {
    $listArticles = true;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Titre de l'article nettoyage et validation
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($title)) {
            $error['title'] = 'Veuillez rentrer un titre';
        } else {
            // $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            // if (!$isOk) {
            //     $error['title'] = 'Le titre n\'est pas valide';
            // }
            if(strlen($title) < 10 || strlen($title) > 150) {
                $error['title'] = 'La longueur du titre n\'est pas valide';
            }
        }

        // Description de l'article nettoyage et validation
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DESCRIPTION . '/')));
            // if (!$isOk) {
            //     $error['description'] = 'La description n\'est pas valide';
            // } else {
                if (strlen($description) < 50 || strlen($description) > 500) {
                    $error["description"] = 'La longueur de la description doit faire minimum 50 caractères et maximum 500 caractères';
                }
            // }
        }

        // Sous-titre 1 de l'article nettoyage et validation
        $secondTitle = filter_input(INPUT_POST, 'secondTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondTitle)) {
            $error['secondTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // $isOk = filter_var($secondTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            // if (!$isOk) {
            //     $error['secondTitle'] = 'Le sous-titre n\'est pas valide';
            // }
            if(strlen($secondTitle) < 10 || strlen($secondTitle) > 150) {
                $error['secondTitle'] = 'La longueur du titre n\'est pas valide';
            }
        }

        // Sous-titre 2 de l'article nettoyage et validation
        $thirdTitle = filter_input(INPUT_POST, 'thirdTitle', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($thirdTitle)) {
            $error['thirdTitle'] = 'Veuillez rentrer un sous-titre';
        } else {
            // $isOk = filter_var($thirdTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TITLE . '/')));
            // if (!$isOk) {
            //     $error['thirdTitle'] = 'Le sous-titre n\'est pas valide';
            // }
            if(strlen($thirdTitle) < 10 || strlen($thirdTitle) > 150) {
                $error['thirdTitle'] = 'La longueur du titre n\'est pas valide';
            }
        }

        // Première section de l'article nettoyage et validation
        $firstSection = filter_input(INPUT_POST, 'firstSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($firstSection)) {
            $error['firstSection'] = 'Veuillez rentrer une section d\'article';
        } else {
            if(strlen($firstSection) < 250 || strlen($firstSection) > 1500) {
                $error['firstSection'] = 'La longueur du texte n\'est pas correct d\'article';
            }
            // $isOk = filter_var($firstSection, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SECTION . '/')));
            // if (!$isOk) {
            //     $error['firstSection'] = 'La section de l\'article n\'est pas valide';
            // } else {
            //     if (strlen($firstSection) < 250 || strlen($firstSection) > 1500) {
            //         $error["firstSection"] = "La longueur du paragraphe doit faire minimum 250 caractères et maximum 1500 caractères";
            //     }
            // }
        }

        // Deuxième section de l'article nettoyage et validation
        $secondSection = filter_input(INPUT_POST, 'secondSection', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($secondSection)) {
            $error['secondSection'] = 'Veuillez rentrer une deuxième section d\'article';
        } else {
            if(strlen($secondSection) < 250 || strlen($secondSection) > 1500) {
                $error['secondSection'] = 'La longueur du texte n\'est pas correct d\'article';
            }
            // $isOk = filter_var($secondSection, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SECTION . '/')));
            // if (!$isOk) {
            //     $error['secondSection'] = 'La deuxième section de l\'article n\'est pas valide';
            // } else {
            //     if (strlen($secondSection) < 250 || strlen($secondSection) > 1500) {
            //         $error["secondSection"] = "La longueur du paragraphe doit faire minimum 250 caractères et maximum 1500 caractères";
            //     }
            // }
        }

        $filename = NULL;
        // Photo de l'article nettoyage et validation
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

            $extension = pathinfo($_FILES['image-article']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('img_') . '.' . $extension;

            $from = $_FILES['image-article']['tmp_name'];
            $to =  __DIR__ . '/../../../public/uploads/article/' . $fileName;

            $moveFile = move_uploaded_file($from, $to);
        } catch (\Throwable $e) {
            $error['image-article'] = $e->getMessage();
        }

        /* array_column permet de transformer mon tableau d'ojects en tableau 
            2 paramètres requis => tableau d'ojects et ce que je recherche dans ce dernier */
        // $gamesId = array_column($gamesArray, 'id_game');

        // // Nettoyage et validation du select d'un jeu
        // $id_game = intval(filter_input(INPUT_POST, 'id_game', FILTER_SANITIZE_NUMBER_INT));

        // if (empty($id_game)) {
        //     $error['id_game'] = 'Veuillez sélectionner un jeu';
        // } else {
        //     if (!in_array($id_game, $gamesId)) {
        //         $error['id_game'] = 'Ce n\'est pas un jeu valide';
        //     }
        // }

        /* array_column permet de transformer mon tableau d'ojects en tableau 
            2 paramètres requis => tableau d'ojects et ce que je recherche dans ce dernier */
        // $consolesId = array_column($consolesArray, 'id_console');

        // Nettoyage et validation du select d'une console
        // $id_console = intval(filter_input(INPUT_POST, 'id_console', FILTER_SANITIZE_NUMBER_INT));

        // if (empty($id_console)) {
        //     $error['id_console'] = 'Veuillez sélectionner une console';
        // } else {
        //     if (!in_array($id_console, $gamesId)) {
        //         $error['id_console'] = 'Ce n\'est pas une console valide';
        //     }
        // }

        // Nettoyage et validation d'un auteur
        // $id_user = filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_SPECIAL_CHARS);

        // if (empty($id_user)) {
        //     $error['id_user'] = 'Veuillez rentrer un pseudo';
        // } else {
        //     $isOk = filter_var($id_user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        //     if (!$isOk) {
        //         $error['id_user'] = 'Le pseudo n\'est pas valide';
        //     }
        // }
        if (empty($error)) {

            $article = new Article();

            $article->setTitle($title);
            $article->setSecondTitle($secondTitle);
            $article->setThirdTitle($thirdTitle);
            $article->setPicture($fileName);
            $article->setDescription($description);
            $article->setFirstSection($firstSection);
            $article->setSecondSection($secondSection);
            // $article->setIdArticle($id_user);

            $result = $article->insert();

            if ($result) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-articles-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}










include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/articles/add-article.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
