<?php
namespace Core;

class ErrorHandler
{
    public static function error($code, $message, $filename, $linenno)
    {
        throw new \ErrorException($message, $code, 1, $filename, $linenno);
    }

    public static function exception(\Throwable $exception)
    {
        exit("<pre>$exception</pre>");
    }
}