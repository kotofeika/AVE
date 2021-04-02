<?php

use Core\Session\SessionManager;
use Core\Http\Route;
    SessionManager::create()->set('authorized', false);
    Route::redirect('/');