<?php

namespace Core;

class View
{
    protected static string $viewPath;

    public static function init(string $viewPath)
    {
        self::$viewPath = $viewPath;
    }

    // fileName == app.home.index
    public static function render(string $fileName, array $data = [])
    {
        $pathParts = explode('.', $fileName);
        $filePath = self::$viewPath . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $pathParts) . '.php';

        ob_start();
        extract($data);
        include $filePath;
        return ob_get_clean();
    }
}