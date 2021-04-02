<?php

namespace App\Http;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Router;
use Core\Session\SessionManager;
use Core\Database\Connect;
use Core\Http\Route;
use Core\View;

class AuthController
{
    public function registerForm()
    {
        return View::render('auth.registerForm');
    }

    public function authorizationForm()
    {
        return View::render('auth.authorizationForm');
    }

    public function register(Request $request, Response $respone)
    {

        $email = $request->post()['email'];
        $pass = $request->post()['password'];
        $name = $request->post()['name'];
        $pdo = new Connect();

        $query = 'SELECT `user_email` FROM `users`';
        $sql = 'INSERT INTO `users`(`user_email`,`user_password`, `user_name`) VALUES (?,?,?)';

        $selectUsersLoginBD = $pdo->select($query);
        if (strlen($pass) > 32)
        {
            SessionManager::create()->setErrors('reg','Пароль не должен превышать 32 символа.');
        }
        foreach($selectUsersLoginBD as $RowUserLogin)
        {
            if ($email === $RowUserLogin['user_email'])
            {
                SessionManager::create()->setErrors('reg','Данный логин уже занят.');
            }
        }
        if ( empty( SessionManager::create()->errors() ) )
        {

            $pdo->insert($sql,[$email, $pass, $name]);
            Route::redirect('/authorization');
        }
        else
        {
            echo SessionManager::create()->errors()['reg'];
            SessionManager::create()->delete('errors');
            die;
        }

    }

    public function authorization(Request $request, Response $respone)
    {

        $email = $request->post()['email'];
        $pass = $request->post()['password'];

        $pdo = new Connect();

        $sql = 'SELECT * FROM `users` WHERE user_email = :id';
        $user = $pdo->execute($sql, [':id'=> $email]);
        if ($pass != $user['user_password']){
            SessionManager::create()->setErrors('auth', "Неверный пароль");
        }
        if ($user == null){
            SessionManager::create()->setErrors('auth', "Аккаунта с данным логином не существует");
        }
        if ( empty(SessionManager::create()->errors()) ){
            SessionManager::create()->set('authorized', true);
            SessionManager::create()->set('user', $user);
            Route::redirect('/');
        }
        else {
            echo SessionManager::create()->errors()['auth'];
            SessionManager::create()->delete('errors');
            die;
        }
    }

    public function logout(){
        SessionManager::create()->set('authorized', false);
        Route::redirect('/');
    }
}