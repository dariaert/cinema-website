<?php

namespace App\controllers;

use App\models\Show;
use core\services\Helper;
use core\view\View;

class ShowController
{

    public $view;
    public $shows;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../views');
        $this->shows = new Show();
    }

    public function AllShow($namePage)
    {
        return $this->view->render("pages/admin/$namePage.php", ['AllShows' => $this->shows->getAllShows()]);
    }

    public function OneShow($namePage, $id)
    {
        return $this->view->render("pages/admin/$namePage.php", ['OneShow' => $this->shows->getOneShow($id)]);
    }

    public function addShow()
    {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $cost = $_POST['cost'];
        $name_film = $_POST['film-sel'];
        $this->shows->addShow($date, $time, $cost, $name_film);
        Helper::redirect('/admin/show');
    }

    public function deleteShow()
    {
        $id = $_POST['id'];
        $this->shows->delShow($id);
        Helper::redirect('/admin/show');
    }

    public function redactShow()
    {
        $id = $_POST['id'];
        $date = $_POST['date_show'];
        $time = $_POST['time_show'];
        $cost = $_POST['cost_show'];
        $name_film = $_POST['film-sel'];
        $this->shows->updShow($id, $date, $time, $cost, $name_film);
        Helper::redirect('/admin/show');
    }

}