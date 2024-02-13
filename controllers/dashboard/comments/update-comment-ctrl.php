<?php
session_start();

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Comment.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listComments = true;

try {
    // Récupération et nettoyage de l'identifiant de la catégorie depuis l'URL.
    $id_comment = intval(filter_input(INPUT_GET, 'id_comment', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations de la catégorie à partir de son identifiant.
    $comment = Comment::get($id_comment);

    // Vérification si la méthode de la requête est POST pour traiter la soumission du formulaire.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Nettoyage et récupération du nouveau nom de catégorie depuis le formulaire.
        $textAreaComment = filter_input(INPUT_POST, 'textAreaComment', FILTER_SANITIZE_SPECIAL_CHARS);
        // Validation du nom de catégorie : vérification qu'il n'est pas vide et qu'il respecte une expression régulière.
        if (empty($textAreaComment)) {
            $error['textAreaComment'] = 'Veuillez entrer un nom de catégorie';
        } else {
            $isOk = filter_var($textAreaComment, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_TEXTAREA . '/')));
            if (!$isOk) {
                $error['textAreaComment'] = 'Veuillez entrer une catégorie valide !';
            }
        }

        // Gestion des erreurs et affichage des alertes si nécessaire.
        if (!empty($error)) {
            $alert['error'] = 'Les données n\'ont pas été insérées !';
        }

        if (empty($error)) {
            $updateComment = new Comment();

            $updateComment->setComment($textAreaComment);
            $updateComment->setIdComment($id_comment);

            $result = $updateComment->update();

            // Si la mise à jour est réussie, affichage d'une alerte de succès et redirection.
            if ($result) {
                $alert['success'] = 'La donnée a bien été mise à jour ! Vous allez être redirigé(e).';
                header('Refresh:3; url=list-comments-ctrl.php');
            }
        }

        // Rechargement des informations de la catégorie après la mise à jour.
        $comment = Comment::get($id_comment);
    }
} catch (PDOException $e) {
    $error['database'] = $e->getMessage();
}

include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/comments/update-comment.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
