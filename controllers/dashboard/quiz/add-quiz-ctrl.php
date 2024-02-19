<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Quiz.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listQuiz = true;

try {
    // Vérification si la méthode de requête est POST pour traiter les données du formulaire
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyage et récupération du nom de la catégorie depuis le formulaire
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);

        // Validation du nom de la catégorie : non vide et conforme à une expression régulière
        if (empty($title)) {
            $error['title'] = 'Veuillez entrer un nom de catégorie';
        } else {
            // Validation supplémentaire avec une expression régulière pour le format du nom
            $isOk = filter_var($title, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CATEGORY . '/')));
            if (!$isOk) {
                $error['title'] = 'Veuillez entrer une catégorie valide !';
            }
        }

        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($description)) {
            $error['description'] = 'Veuillez rentrer une description';
        } else {
            // Validation de la longueur de la description
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_QUIZ_DESCRIPTION . '/')));
            if (!$isOk) {
                $error['description'] = 'Veuillez renseigner une description de jeu correct';
            }
            if (strlen($description) > 255) {
                $error['description'] = 'Votre message est trop long';
            }
        }

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

            $to =  __DIR__ . '/../../../public/uploads/quiz/' . $fileName;
            $moveFile = move_uploaded_file($from, $to);

            if ($extension == 'jpeg' || $extension == 'jpg') {
                $image = imagecreatefromjpeg($to);
            } elseif ($extension == 'jpg') {
                $image = imagecreatefrompng($to);
            } else {
                $image = imagecreatefromavif($to);
            }

            $width = 900;
            $height = -1;

            $mode = IMG_BILINEAR_FIXED;

            $resampledObject = imagescale($image, $width, $height, $mode);
            imagejpeg($resampledObject, $to);
        } catch (\Throwable $e) {
            $error['picture'] = $e->getMessage();
        }

        // Gestion des erreurs et affichage des messages d'alerte
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        // if (Category::isExist($title)) {
        //     $error['title'] = 'Catégorie déjà existante';
        //     $alert['error'] = 'Les données n\'ont pas été insérées !';
        // }

        // Si pas d'erreur, procédure d'insertion de la catégorie
        if (empty($error)) {
            $quiz = new quiz();
            $quiz->setQuizTitle($title);
            $quiz->setQuizPicture($fileName);
            $quiz->setQuizDescription($description);
            $result = $quiz->insert();

            // Vérification du succès de l'insertion et redirection
            if ($result > 0) {
                $alert['success'] = 'La donnée a bien été insérée ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-quiz-ctrl.php');
            }
        }
    }
} catch (PDOException $e) {
    die('Erreur add ' . $e->getMessage());
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/quiz/add-quiz.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
