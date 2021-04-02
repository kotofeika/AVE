<?php

namespace App\Http;

use Core\View;
use Core\Http\{Request, Response};

class HomeController
{
    public function index(Request $request, Response $response)
    {
        return View::render('home.index', []);
    }
}
