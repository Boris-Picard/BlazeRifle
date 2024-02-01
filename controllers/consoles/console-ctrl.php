<?php
require_once __DIR__ . '/../../models/Console.php';
require_once __DIR__ . '/../../models/Article.php';

try {
    $id_console = intval(filter_input(INPUT_GET, 'id_console', FILTER_SANITIZE_NUMBER_INT));

    $console = Console::get($id_console);

    $articles = Article::getAll(id_console: $id_console);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}




include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/consoles/console.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
