<?php

namespace App\controllers;

use App\models\Schedule;
use core\view\View;

class ScheduleController
{

    public $view;
    public $schedule;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../views');
        $this->schedule = new Schedule();
    }

    public function AllDate($namePage)
    {
        return $this->view->render("pages/$namePage.php", ['dataAllDate' => $this->schedule->getAllDate()]);
    }

    public function OneShow($namePage, $id)
    {
        return $this->view->render("pages/$namePage.php", ['dataOneShow' => $this->schedule->getOneShow($id)]);
    }

}