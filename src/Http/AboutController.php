<?php

namespace App\Http;


use Core\View;
use Core\Http\{Request, Response};

class AboutController
{
    public function about(Request $request, Response $response)
    {
        return View::render('about.about', []);
    }
}
