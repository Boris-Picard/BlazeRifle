<?php

class Date_Comment
{
    public static function formatDateComment($articles)
    {

        foreach ($articles as $article) {
            $timestamp = strtotime($article->article_created_at);
            $article->formattedHour = date('H:i', $timestamp);
            $article->formattedDate = date('d-m-y', $timestamp);
            $countComments = Comment::count($article->id_article);
            $article->countComments = $countComments;
        }
    }

    public static function eventDate($events)
    {
        foreach ($events as $event) {
            $timestamp = strtotime($event->event_date);
            $event->formattedHour = date('H:i', $timestamp);
            $event->formattedDate = date('d-m-Y', $timestamp);
        }
    }
}
