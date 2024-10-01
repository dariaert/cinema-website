<?php

namespace core\models;

use services\Connect;

class Favourites
{

    public function getAllFav()
    {
        session_start();
        $user_id = $_SESSION["user"]["id"];
        $query = Connect::Connect()->query("SELECT * FROM (((`favourites` INNER JOIN film ON favourites.id_favourites_film = film.id_film) INNER JOIN genre ON film.id_genre = genre.id) INNER JOIN age_limit ON film.id_ageLimit = age_limit.id) WHERE id_user = '$user_id'");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getOneFav($id)
    {
        session_start();
        $user_id = $_SESSION["user"]["id"];
        $query = Connect::Connect()->query("SELECT * FROM `favourites` WHERE id_user = '$user_id' AND id_favourites_film = '$id'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    public function addFav($id_film)
    {
        session_start();
        $user_id = $_SESSION["user"]["id"];

        $add = Connect::Connect()->query("INSERT INTO `favourites`(`id_favourites`, `id_favourites_film`, `id_user`) VALUES (NULL,'$id_film','$user_id')");
    }

    public function delFav($id)
    {
        session_start();
        $user_id = $_SESSION["user"]["id"];
        $delete = Connect::Connect()->query("DELETE FROM `favourites` WHERE id_user = '$user_id' AND id_favourites_film = '$id'");
    }

}