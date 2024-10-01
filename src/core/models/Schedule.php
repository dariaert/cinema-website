<?php

namespace core\models;

use services\Connect;

class Schedule
{

    public function getAllDate()
    {
        $query = Connect::Connect()->query("SELECT * FROM (show_film INNER JOIN film ON show_film.id_film = film.id_film) ORDER BY date ASC");
        $queryAllShow = [];
        $uniqueDates = []; // Массив для отслеживания уникальных дат
        while ($row = mysqli_fetch_assoc($query)) {
            $date = date("d.m.y", strtotime($row['date']));
            // Проверяем, была ли уже выведена такая дата
            if (!in_array($date, $uniqueDates)) {
                $queryAllShow[] = $row;
                $uniqueDates[] = $date;
            }
        }

        return $queryAllShow;
    }

    public function getAllMovieOneDate($date)
    {
        $queryMovies = Connect::Connect()->query("SELECT * FROM (((show_film INNER JOIN film ON show_film.id_film = film.id_film) INNER JOIN genre ON film.id_genre = genre.id) INNER JOIN age_limit ON film.id_ageLimit = age_limit.id) WHERE `date` = '$date'");
        $dates = [];
        while ($movie = mysqli_fetch_assoc($queryMovies)) {
            $dates[] = $movie;
        }

        return $dates;
    }

    public function getTime($date, $id_film)
    {
        $query = Connect::Connect()->query("SELECT * FROM show_film WHERE `date` = '$date' AND `id_film` = '$id_film' ORDER BY time ASC");
        $times = [];
        while ($time = mysqli_fetch_assoc($query)) {
            $times[] = $time;
        }

        return $times;
    }

    public function getOneShow($id)
    {
        $query = Connect::Connect()->query("SELECT * FROM (show_film INNER JOIN film ON show_film.id_film = film.id_film) WHERE id = '$id'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

}