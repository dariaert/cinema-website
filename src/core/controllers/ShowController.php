<?php

namespace core\controllers;

use core\models\Show;
use services\Helper;

class ShowController
{

    public function AllShow($namePage)
    {
        $Show = new Show();
        $dataAllShow = $Show -> getAllShows();
        require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
    }

    public function OneShow($namePage, $id)
    {
        $Show = new Show();
        $dataOneShow = $Show -> getOneShow($id);
        require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
    }

    public function addShow()
    {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $cost = $_POST['cost'];
        $name_film = $_POST['film-sel'];
        $Show = new Show();
        $data = $Show -> addShow($date, $time, $cost, $name_film);
        Helper::redirect('/admin/show');
    }

    public function deleteShow()
    {
        $id = $_POST['id'];
        $Show = new Show();
        $data = $Show -> delShow($id);
        Helper::redirect('/admin/show');
    }

    public function redactShow()
    {
        $id = $_POST['id'];
        $date = $_POST['date_show'];
        $time = $_POST['time_show'];
        $cost = $_POST['cost_show'];
        $name_film = $_POST['film-sel'];
        $Show = new Show();
        $data = $Show -> updShow($id, $date, $time, $cost, $name_film);
        Helper::redirect('/admin/show');
    }

}