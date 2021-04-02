<?php


namespace App\Http;

use Core\Database\Connect;
use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Core\Session\SessionManager;
use Core\View;

class ProfileController
{
    public function lkForm()
    {
        return View::render('profile.lkForm');
    }
    public function childForm()
    {
        return View::render('profile.child_form');
    }
    public function childLoad(Request $request, Response $respone)
    {

        $name = $request->post()['name'];
        $age = $request->post()['age'];
        $sex = $request->post()['sex'];
        $user_id= SessionManager::create()->user('user_id');
        $pdo = new Connect();
        $query = 'SELECT `user_email` FROM `users`';
        $sql = 'INSERT INTO `childs`(`name`,`age`, `sex`, `user_id`) VALUES (?,?,?,?)';
        $pdo->insert($sql,[$name, $age, $sex, $user_id]);
        Route::redirect('/profile?id='.SessionManager::create()->user('user_id'));
    }
}