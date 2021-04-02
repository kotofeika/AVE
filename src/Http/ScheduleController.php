<?php


namespace App\Http;

use Core\View;

class ScheduleController
{
    public function schedule()
    {
        return View::render('schedule.schedule');
    }

}