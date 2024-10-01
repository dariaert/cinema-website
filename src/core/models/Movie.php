<?php

namespace core\models;

use router\Router;
use services\Connect;

class Movie
{

    private const IMAGE_DIRECTORY = '/src/uploads';
    private const UPLOAD_PATH = __DIR__ . '/../../uploads/';

    public function getAllMovie()
    {
        $query = Connect::Connect()->query("SELECT * FROM ((film INNER JOIN genre ON film.id_genre = genre.id) INNER JOIN age_limit ON film.id_ageLimit = age_limit.id)");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getOneMovie($id)
    {
        $query = Connect::Connect()->query("SELECT * FROM ((film INNER JOIN genre ON film.id_genre = genre.id) INNER JOIN age_limit ON film.id_ageLimit = age_limit.id) WHERE id_film = '$id'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    public function delFilm($id, $name_poster)
    {

        $query = Connect::Connect()->query("SELECT * FROM `favourites` WHERE id_favourites_film = '$id'");
        $row = mysqli_fetch_assoc($query);
        if(empty($row))
        {
            $uploadDirectory = self::UPLOAD_PATH;

            $imageDirectory = self::IMAGE_DIRECTORY . '/';

            $imageName = str_replace($imageDirectory, '', $name_poster);

            $currentMovieImage = $uploadDirectory . $imageName;
            if (file_exists($currentMovieImage)) {
                unlink($currentMovieImage);
            }

            $delete = Connect::Connect()->query("DELETE FROM `favourites` WHERE id_favourites_film = '$id'");

            $deleteFilm = Connect::Connect()->query("DELETE FROM `film` WHERE id_film = '$id'");
        }

    }

    public function addFilm($name, $name_genre, $poster, $actors, $duration, $name_ageLimit, $filmmaker, $country, $description){

        $genre = Connect::Connect()->query("SELECT * FROM `genre` WHERE name_genre = '$name_genre'");
        $row_genre = mysqli_fetch_assoc($genre);
        $id_genre = $row_genre['id'];
        $ageLimit = Connect::Connect()->query("SELECT * FROM `age_limit` WHERE name_ageLimit = '$name_ageLimit'");
        $row_ageLimit = mysqli_fetch_assoc($ageLimit);
        $id_ageLimit = $row_ageLimit['id'];

        $uploadDirectory = self::UPLOAD_PATH;
        $imageDirectory = self::IMAGE_DIRECTORY;

        if(!empty($poster)){
            if(!is_dir($uploadDirectory)){
                mkdir($uploadDirectory,0777,true);
            }
        }

        $ext = pathinfo($poster['name'], PATHINFO_EXTENSION);
        $fileName = 'poster_' . time() . ".$ext";

        if (!move_uploaded_file($poster['tmp_name'], "$uploadDirectory/$fileName")){
            die("Ошибка при загрузке");
        }

        $path = "$imageDirectory/$fileName";

        $add = Connect::Connect()->query("INSERT INTO `film`(`id_film`, `name_film`, `id_genre`, `id_ageLimit`, `poster_film`, `description`, `actors`, `filmmaker`, `country`, `duration_film`) VALUES (NULL,'$name','$id_genre','$id_ageLimit','$path','$description','$actors','$filmmaker','$country','$duration')");

    }

    public function updFilm($id, $name, $id_genre, $actors, $duration, $ageLimit, $filmmaker_film, $country_film, $poster, $description)
    {
        $genre = Connect::Connect()->query("SELECT * FROM `genre` WHERE name_genre = '$id_genre'");
        $row_genre = mysqli_fetch_assoc($genre);
        $id_genre = $row_genre['id'];

        $ageLimit = Connect::Connect()->query("SELECT * FROM `age_limit` WHERE name_ageLimit = '$ageLimit'");
        $row_ageLimit = mysqli_fetch_assoc($ageLimit);
        $id_ageLimit = $row_ageLimit['id'];

        $uploadDirectory = self::UPLOAD_PATH;
        $imageDirectory = self::IMAGE_DIRECTORY;

        if(!empty($poster)){
            if(!is_dir($uploadDirectory)){
                mkdir($uploadDirectory,0777,true);
            }
        }

        $ext = pathinfo($poster['name'], PATHINFO_EXTENSION);
        $fileName = 'poster_' . time() . ".$ext";

        if (!move_uploaded_file($poster['tmp_name'], "$uploadDirectory/$fileName")){
            die("Ошибка при загрузке");
        }

        $path = "$imageDirectory/$fileName";
        $update = Connect::Connect()->query("UPDATE `film` SET `name_film`='$name',`id_genre`='$id_genre',`id_ageLimit`='$id_ageLimit',`poster_film`='$path',`description`='$description',`actors`='$actors',`filmmaker`='$filmmaker_film',`country`='$country_film',`duration_film`='$duration' WHERE id_film = '$id'");

    }

    public function getAllAgeLimit()
    {
        $query = Connect::Connect()->query("SELECT * FROM `age_limit`");
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        return $data;
    }

}