<?php

namespace Core;

use Core\Session\SessionManager;
use Core\Database\Connect;

class AdminCheck
{
    protected static string $query = 'SELECT `Admin` FROM `users` WHERE `user_id` = :id';
    public static function Check()
    {
        $id = SessionManager::create()->user('user_id');
        $pdo = new Connect();
        $options = [':id' => $id];
        $Admin = $pdo->selectOne(self::$query, $options);

        return($Admin);
    }
}