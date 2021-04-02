<?php


namespace Core\Http;


class Route
{
    public static function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }
}