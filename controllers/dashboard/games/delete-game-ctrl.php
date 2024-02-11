<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console_Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();


try {
    // Récupération de l'ID du jeu depuis les paramètres de l'URL
    $id_game = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    // Récupération des informations du jeu à supprimer
    $game = Game::get($id_game);

    // Suppression du jeu de la base de données
    $isDeleted = Game::delete($id_game);
    $getConsoleByIdGame = Game::getConsoleIdsByGameId($id_game);


    // Si la suppression a réussi, on supprime également l'image associée
    // Et des données dans la table relationnel consoles_games
    if ($isDeleted > 0) {
        foreach ($getConsoleByIdGame as $consoleId) {
            Console_Game::delete($consoleId, $id_game);
        }
        $link = unlink('../../../public/uploads/games/' . $game->game_picture);
        // Message de succès si la suppression a réussi
        $_SESSION['msg'] = 'La donnée a bien été supprimée !';
    } else {
        // Message d'erreur si la suppression a échoué
        $_SESSION['msg'] = 'Erreur, la donnée n\'a pas été supprimée !';
    }

    // Redirection vers la liste des jeux après la suppression
    header('Location: /controllers/dashboard/games/list-games-ctrl.php');
    die;
} catch (PDOException $e) {
    $_SESSION['msg'] = $e->getMessage();
    header('Location: /controllers/dashboard/games/list-games-ctrl.php');
    die;
}


include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/list-games.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
