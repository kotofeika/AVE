<?php

use Core\Auth\AuthController;
use Core\SendTo;

$registration = AuthController::Check($_POST['login'], $_POST['password']);
if ($registration){
    SendTo::SendTo('authorization_form.php');
}else{
    SendTo::SendTo('registerForm.php');
}