<?php

namespace Core\Image;

use Core\Database\Connect;
use Core\Session\SessionManager;

class FormUploader
{
    protected static string $dir = "uploaded";

    public static function upload(string $imageName, $tmp_name, $mini_description, $description, $name): bool
    {
        $full_path = self::getFullPath($imageName);
        $status = move_uploaded_file($tmp_name, $full_path);
        if ($status === false) {
            return false;
        }
        $db = new Connect();
        $img_name = explode(DIRECTORY_SEPARATOR, $full_path);
        $img_name = end($img_name);
        $db->executeAll('INSERT INTO `pictures`(`img_name`,`user_id`,`mini_description`, `description`, `name`) VALUES (?,?,?,?,?)',
            [$img_name, SessionManager::create()->user('user_id'), $mini_description, $description, $name]);
        return true;
    }

    public static function getFullPath($imageName)
    {
        $filename = explode('.', $imageName);
        $extension = end($filename);
        $name = date_create_from_format('U.u', microtime(true))->format('Y-m-d_H-i-s_u');
        return self::$dir . DIRECTORY_SEPARATOR . $name . "." . $extension;
    }
}