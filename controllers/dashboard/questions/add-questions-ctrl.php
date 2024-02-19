<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Question.php';
require_once __DIR__ . '/../../../models/Quiz.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listQuiz = true;
$addQuestions = true;

try {
    $id_quiz = intval(filter_input(INPUT_GET, 'id_quiz', FILTER_SANITIZE_NUMBER_INT));
    $quiz = Quiz::get($id_quiz);
    // Vérification si la méthode de requête est POST pour traiter les données du formulaire
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $questions = array(
            'questions' => array(
                'name' => 'questions',
                'type' => INPUT_POST,
                'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                'flags' => FILTER_REQUIRE_ARRAY
            )
        );
        // Nettoyage et récupération du nom de la catégorie depuis le formulaire
        $sanitizeQuestions = filter_input_array(INPUT_POST, $questions);

        foreach ($sanitizeQuestions as $key => $question) {
            if (empty($question)) {
                $error['questions'][$key] = 'Veuillez entrer une question';
            } else {
                $isOk = filter_var($question, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_QUESTIONS . '/')));
                if (!$isOk) {
                    $error['questions'][$key] = 'Veuillez entrer une question valide !';
                }
            }
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
include __DIR__ . '/../../../views/dashboard/questions/add-questions.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
