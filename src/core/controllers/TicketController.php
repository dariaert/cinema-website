<?php

namespace core\controllers;

use App\view\View;
use core\models\Ticket;
use services\Helper;

class TicketController
{

    public $view;
    public $tickets;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->tickets = new Ticket();
    }

    public function bookingSeat()
    {
        $activeSeat = $_POST['activeSeat'];
        $activeShow = $_POST['activeShow'];
        $activeCost = $_POST['activeCost'];
        $this->tickets->addAllSeat($activeSeat, $activeShow, $activeCost);
        Helper::redirect('/profile');
    }

    public function AllTicket($namePage)
    {
        return $this->view->render("pages/$namePage.php", ['AllTicket' => $this->tickets->getAllTicket()]);
    }

}