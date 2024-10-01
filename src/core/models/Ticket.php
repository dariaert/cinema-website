<?php

namespace core\models;

use services\Connect;

class Ticket
{

    public function getAllSeat($id)
    {
        $query = "SELECT * FROM `ticket` WHERE id_show_film = '$id'";
        $querySeat = mysqli_query(Connect::Connect(), $query);
        $AllSeat = [];
        while ($row = mysqli_fetch_assoc($querySeat)) {
            $AllSeat[] = $row;
        }

        $seat_set = array();

        foreach ($AllSeat as $val) {
            if (isset($val['id_seat'])) {
                $seat_set[] = $val['id_seat'];
            }
        }

        return $seat_set;
    }

    public function addAllSeat($activeSeat, $activeShow, $activeCost)
    {
        $today = date("Y-m-d H:i:s");
        session_start();
        $user_id = $_SESSION["user"]["id"];
        $array = json_decode($activeSeat);
        $cost = $activeCost * count($array);
        $queryBooking = Connect::Connect()->query("INSERT INTO `booking`(`id`, `dateBoking`, `amount`, `id_user`) VALUES (NULL,'$today','$cost','$user_id')");
        $lastInsertedId = Connect::Connect()->query("SELECT id FROM booking ORDER BY id DESC LIMIT 1");
        $bookingID = mysqli_fetch_assoc($lastInsertedId);
        $ID = $bookingID['id'];
        foreach ($array as $item)
        {

            $queryTicket = Connect::Connect()->query("INSERT INTO `ticket`(`id`, `id_seat`, `id_show_film`) VALUES (NULL,'$item','$activeShow')");

            $queryCurrentTicket = Connect::Connect()->query("SELECT * FROM `ticket` WHERE `id_seat` = '$item' AND `id_show_film` = '$activeShow'");

            $ticketID = mysqli_fetch_assoc($queryCurrentTicket);

            $IDTick = $ticketID['id'];

            $queryOrder = Connect::Connect()->query("INSERT INTO `order_element`(`id`, `id_ticket`, `id_order`) VALUES (NULL,'$IDTick','$ID')");

        }
    }

    public function delAllTicket()
    {

        $queryAllShow = Connect::Connect()->query("SELECT * FROM `show_film` WHERE date < CURRENT_DATE");

        $AllShow = [];
        $AllTicket = [];
        $AllOrder = [];

        while ($row = mysqli_fetch_assoc($queryAllShow))
        {
            $AllShow[] = $row['id'];
        }

        foreach ($AllShow as $item)
        {
            $queryAllTicket = Connect::Connect()->query("SELECT * FROM `ticket` WHERE id_show_film = '$item'");
            while ($val = mysqli_fetch_assoc($queryAllTicket)) {
                $AllTicket[] = $val['id'];
            }
        }

        foreach ($AllTicket as $item)
        {
            $queryAllOrder = Connect::Connect()->query("SELECT * FROM `order_element` WHERE id_ticket = '$item'");
            while ($val = mysqli_fetch_assoc($queryAllOrder)) {
                $AllOrder[] = $val['id'];
            }
        }

        foreach ($AllOrder as $item)
        {
            $deleteOrder = Connect::Connect()->query("DELETE FROM `order_element` WHERE `id` = '$item'");
        }

        foreach ($AllTicket as $item)
        {
            $deleteOrder = Connect::Connect()->query("DELETE FROM `ticket` WHERE `id` = '$item'");
        }

        $deleteShow = Connect::Connect()->query("DELETE FROM `show_film` WHERE date < CURRENT_DATE");

    }

    public function getAllTicket()
    {
        session_start();
        $user_id = $_SESSION["user"]["id"];

        $queryAllTicket = Connect::Connect()->query("SELECT * FROM (((((order_element INNER JOIN booking ON order_element.id_order = booking.id) INNER JOIN ticket ON order_element.id_ticket = ticket.id) INNER JOIN show_film ON ticket.id_show_film = show_film.id) INNER JOIN film ON show_film.id_film = film.id_film)  INNER JOIN seat ON ticket.id_seat = seat.id) WHERE booking.id_user = '$user_id' ORDER BY booking.dateBoking DESC");

        $AllTicket = [];

        while ($row = mysqli_fetch_assoc($queryAllTicket)) {
            $AllTicket[] = $row;
        }

        return $AllTicket;
    }

}