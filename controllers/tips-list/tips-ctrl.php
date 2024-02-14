<?php
session_start();
require_once __DIR__ . '/../../helpers/CheckPermissions.php';
require_once __DIR__ . '/../../models/Article.php';
require_once __DIR__ . '/../../models/Game.php';
require_once __DIR__ . '/../../models/Comment.php';

CheckPermissions::checkMember();

try {
    $articles = Article::getAll(id_category: REGEX_TIPS, showConfirmedAt: true, order: 'DESC', limit: 3);
    $game = Game::get(3);
    foreach ($articles as $article) {
        $timestamp = strtotime($article->article_created_at);
        $article->formattedHour = date('H:i', $timestamp);
        $article->formattedDate = date('d-m-y', $timestamp);
        $id_article = $article->id_article;
        $countComments = Comment::count($id_article);
    }
} catch (PDOException $e) {
    die('Erreur tips : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/templates/navbar.php';
include __DIR__ . '/../../views/tips-list/tips.php';
include __DIR__ . '/../../views/templates/socials.php';
include __DIR__ . '/../../views/templates/footer.php';
