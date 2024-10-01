<?php

namespace core\controllers;

use core\models\Ticket;
use services\Helper;

class TicketController
{

    public function bookingSeat()
    {
        $activeSeat = $_POST['activeSeat'];
        $activeShow = $_POST['activeShow'];
        $activeCost = $_POST['activeCost'];
        $Ticket = new Ticket();
        $data = $Ticket -> addAllSeat($activeSeat, $activeShow, $activeCost);
        Helper::redirect('/profile');
    }

    public function AllTicket($namePage)
    {
        $Ticket = new Ticket();
        $AllTicket = $Ticket -> getAllTicket();
        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

}