<?php

namespace core\models;

use services\Connect;

class Show
{

    public function getAllShows()
    {
        $query = Connect::Connect()->query("SELECT * FROM `show_film` INNER JOIN film ON show_film.id_film = film.id_film");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getOneShow($id)
    {
        $query = Connect::Connect()->query("SELECT * FROM `show_film` WHERE id = '$id'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    public function addShow($date, $time, $cost, $name_film)
    {
        $film = Connect::Connect()->query("SELECT * FROM `film` WHERE name_film = '$name_film'");
        $row_film = mysqli_fetch_assoc($film);
        $id_film = $row_film['id_film'];

        $add = Connect::Connect()->query("INSERT INTO `show_film`(`id`, `date`, `time`, `id_film`, `cost`) VALUES (NULL,'$date','$time','$id_film','$cost')");
    }

    public function delShow($id)
    {
        $delete = Connect::Connect()->query("DELETE FROM `show_film` WHERE id = '$id'");
    }

    public function updShow($id, $date, $time, $cost, $name_film)
    {
        $movie = Connect::Connect()->query("SELECT * FROM `film` WHERE name_film = '$name_film'");
        $row_movie = mysqli_fetch_assoc($movie);
        $id_movie = $row_movie['id_film'];
        $update = Connect::Connect()->query("UPDATE `show_film` SET `date`='$date',`time`='$time',`id_film`='$id_movie',`cost`='$cost' WHERE id = '$id'");
    }

}