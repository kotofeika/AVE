<?php

namespace App\Http;

use Core\Database\Connect;
use Core\Http\Route;

class DeleteController
{
    public function delete()
    {
        $pdo = new Connect();
        $query = 'DELETE FROM `pictures` WHERE `img_name` = (?)';
        $options = $_GET['id'];
        $pdo->insert($query, [$options]);
        unlink('uploaded/'.$_GET['id']);
        Route::redirect('/');
    }

    public function deleteProfile()
    {
        $pdo = new Connect();
        $sql= 'DELETE FROM `users` WHERE `user_id` = (?)';
        $pdo->update($sql, [ $_GET['id'] ]);
        $sql = 'DELETE FROM `pictures` WHERE `user_id` = (?)';
        $pdo->update($sql, [ $_GET['id'] ]);
        Route::Redirect('/');
    }
}