<?php
session_start();
require_once __DIR__ . '/../../../models/Game.php';
require_once __DIR__ . '/../../../models/Console_Game.php';
require_once __DIR__ . '/../../../helpers/CheckPermissions.php';

$check = CheckPermissions::checkAdmin();

$listGames = true;

try {
    // Récupération de tous les jeux et des consoles depuis la base de données 
    $games = Game::concat();
    // Récupération du message stocké en session (s'il existe)
    $msg = filter_var($_SESSION['msg'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

    // Suppression du message en session après l'avoir récupéré
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }
} catch (PDOException $e) {
    exit('Erreur : ' . $e->getMessage());
}



include __DIR__ . '/../../../views/templates/header-dashboard.php';
include __DIR__ . '/../../../views/templates/sidebar-dashboard.php';
include __DIR__ . '/../../../views/dashboard/games/list-games.php';
include __DIR__ . '/../../../views/templates/footer-dashboard.php';
