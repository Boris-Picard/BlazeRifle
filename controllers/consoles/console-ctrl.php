<?php
require_once __DIR__ . '/../../models/Console.php';
require_once __DIR__ . '/../../models/Article.php';

try {
    // Convertir et filtrer l'ID de la console à partir de la requête GET
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    // Récupérer l'objet Console correspondant à l'ID
    $console = Console::get($id_console);

    // Récupérer tous les articles associés à la console spécifiée
    $articles = Article::getAll(id_console: $id_console);

    // Formater la date et l'heure de chaque article pour affichage
    foreach ($articles as $article) {
        $timestamp = strtotime($article->created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d-m-Y', $timestamp);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}





include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/consoles/console.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
