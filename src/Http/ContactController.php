<?php


namespace App\Http;


use Core\View;

class ContactController
{
    public function contact()
    {
        return View::render('contact.contact');
    }
}