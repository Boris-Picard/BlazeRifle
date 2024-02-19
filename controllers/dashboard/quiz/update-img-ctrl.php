<?php
session_start();
require_once __DIR__ . '/../../../models/Quiz.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

try {
    $id_quiz = intval(filter_input(INPUT_GET, 'id_quiz', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des détails de l'article à mettre à jour
    $quiz = Quiz::get($id_quiz);


    if ($quiz->quiz_picture) {
        // Tentative de suppression du fichier image associé
        $link = unlink('../../../public/uploads/quiz/' . $quiz->quiz_picture);

        // Mise à jour du champ image dans la base de données
        $deleteImg = Quiz::updateImg($id_quiz);
    }

    // Gestion des messages de session en fonction du succès ou de l'échec de la suppression d'image
    if ($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur : l\'image n\'a pas été supprimée !';
    }

    header('Location: /controllers/dashboard/quiz/update-quiz-ctrl.php?id_quiz=' . $quiz->id_quiz);
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/quiz/update-quiz.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
