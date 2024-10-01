<?php

namespace core\models;

use services\Connect;

class Genre
{

    public function getAllGenre()
    {
        $query = Connect::Connect()->query("SELECT * FROM `genre`");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getOneGenre($id)
    {
        $query = Connect::Connect()->query("SELECT * FROM `genre` WHERE id = '$id'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    public function addGenre($name)
    {
        $add = Connect::Connect()->query("INSERT INTO `genre`(`id`, `name_genre`) VALUES (NULL,'$name')");
    }

    public function delGenre($id)
    {
        $delete = Connect::Connect()->query("DELETE FROM `genre` WHERE id = '$id'");
    }

    public function updGenre($id, $name)
    {
        $update = Connect::Connect()->query("UPDATE `genre` SET `name_genre`='$name' WHERE id = '$id'");
    }

}