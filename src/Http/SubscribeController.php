<?php

namespace App\Http;

use Core\Database\Connect;
use Core\Http\Request;
use Core\Http\Route;
use Core\Session\SessionManager;

class SubscribeController
{
    public function subscribe(Request $request)
    {
        $errors = false;
        $pic_id = $request->get()['id'];
        $child_id = $request->post()['id'];
        $pdo = new Connect();

        $sql = 'SELECT `id`, `name`, `user_id` FROM `childs` WHERE id = :id';
        $child = $pdo->execute($sql, [':id'=> $child_id]);

        $sql = 'SELECT `id`, `name` FROM pictures WHERE id = :id';
        $pic = $pdo->execute($sql, [':id' => $pic_id]);

        $sql ='SELECT `child_id` FROM `childs_pictures` WHERE `pic_id` = :id';
        $check = $pdo->executeAll($sql, [':id' => $pic_id]);
        foreach ($check as $check_one) {
            if($check_one['child_id'] === $child_id){
                SessionManager::create()->setErrors('sub', 'Этот ребенок уже записан на данную секию');
                $errors = true;
                Route::redirect('/details?id='. $pic_id . '#popup');
            }
        }
        if ($errors === false){
            $pdo->insert('INSERT INTO `childs_pictures`(`child_id`,`child_name`, `pic_id`, `pic_name`, `parent_id`)
                VALUES (?,?,?,?,?)', [ $child['id'], $child['name'], $pic['id'], $pic['name'], $child['user_id'] ]);
            Route::redirect('/profile');
        }

    }
}