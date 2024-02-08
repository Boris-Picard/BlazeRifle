<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

try {
    // Récupérer l'ID du jeu depuis la requête GET
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer les détails du jeu
    $game = Game::get($id_game);

    // Vérifier si le jeu a une image associée
    if($game->game_picture) {
        // Supprimer le fichier image du répertoire
        $link = unlink('../../../public/uploads/games/'.$game->game_picture);

        // Mettre à jour la colonne d'image dans la base de données (peut-être une suppression de l'image)
        $deleteImg = Game::updateImg($id_game);
    }

    // Vérifier si la suppression de l'image a réussi
    if($deleteImg) {
        $_SESSION['msg'] = 'L\'image a bien été supprimée !';
    } else {
        $_SESSION['msg'] = 'Erreur, l\'image n\'a pas été supprimée !';
    }
    
    // Rediriger vers la page de mise à jour du jeu après la suppression de l'image
    header('Location: /controllers/dashboard/games/update-game-ctrl.php?id='.$game->id_game);
    die;
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/update-game.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';