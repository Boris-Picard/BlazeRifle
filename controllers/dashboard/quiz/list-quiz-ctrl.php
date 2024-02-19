<?php
session_start();
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Quiz.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listQuiz = true;

try {
    $id_quiz = intval(filter_input(INPUT_GET, 'id_quiz', FILTER_SANITIZE_NUMBER_INT));

    $idQuizToUse = !empty($id_quiz) ? $id_quiz : null;
    $quiz = Quiz::get($idQuizToUse);

    $allQuiz = Quiz::getAll();

    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    if ($quiz) {
        $deleted_at = $quiz->deleted_at;

        if ($deleted_at !== NULL) {
            $bool = true;
        } else {
            $bool = false;
        }

        Quiz::active($id_quiz, $bool);

        header('location: /controllers/dashboard/quiz/list-quiz-ctrl.php');
        die;
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/quiz/list-quiz.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
