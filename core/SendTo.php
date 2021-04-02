<?php


namespace Core;


class SendTo
{
    public static function SendTo(string $file)
    {
        header('Location: '.$file);
        exit;
    }
}