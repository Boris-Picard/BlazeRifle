<?php

class Date_Comment
{
    public static function formatDateComment($articles) {
        
        foreach ($articles as $article) {
            $timestamp = strtotime($article->article_created_at);
            $article->formattedHour = date('H:i', $timestamp);
            $article->formattedDate = date('d-m-y', $timestamp);
            $countComments = Comment::count($article->id_article);
            $article->countComments = $countComments;
        }
    }
}

