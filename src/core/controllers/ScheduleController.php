<?php

namespace core\controllers;

use core\models\Schedule;
use services\Helper;

class ScheduleController
{

    public function AllDate($namePage)
    {
        $Schedule = new Schedule();
        $dataAllDate = $Schedule -> getAllDate();
        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

    public function OneShow($namePage, $id)
    {
        $Schedule = new Schedule();
        $dataOneShow = $Schedule -> getOneShow($id);
        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

}