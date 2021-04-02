<?php

use App\Http\DeleteController;
use Localhost\SendTo;

DeleteController::class->delete($_GET['id']);
SendTo::SendTo('index.php');
