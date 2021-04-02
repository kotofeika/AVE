<?php


namespace App\Http;

use Core\View;

class DetailsController
{
    public function details()
    {
        return View::render('details.details');
    }
}