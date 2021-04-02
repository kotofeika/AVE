<?php


namespace App\Http;

use Core\Http\Request;
use Core\Http\Response;
use Core\Image\FormUploader;
use Core\Http\Route;
use Core\Session\SessionManager;
use Core\View;

class LoadController
{
    public function loadForm()
    {
        return View::render('load.loadForm');
    }

    public function load(Request $request, Response $response)
    {
        $mini_description = $request->post()['mini_description'];
        $description = $request->post()['description'];
        $name = $request->post()['name'];
        $total_files = count($_FILES['image']['name']);
        for ($key = 0; $key < $total_files; $key++) {
            $success = FormUploader::upload($_FILES['image']['name'][$key], $_FILES['image']['tmp_name'][$key], $mini_description, $description, $name);
        }
        Route::redirect('/profile?id=' . SessionManager::create()->user('user_id'));
    }

}