<?php

use Core\Http\Route;

$pdo = new \Localhost\DB();
$sql= 'DELETE FROM `users` WHERE `user_id` = (?)';
$pdo->update($sql, [ $_GET['id'] ]);
$sql = 'DELETE FROM `pictures` WHERE `user_id` = (?)';
$pdo->update($sql, [ $_GET['id'] ]);
Route::Redirect('/');