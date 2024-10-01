<?php

namespace core\controllers;

use core\models\Movie;
use services\Helper;

class MovieController
{

    public function AllMovie($namePage)
    {
        $Movie = new Movie();
        $dataAllMovie = $Movie -> getAllMovie();
        if($namePage == "panel"){
            require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
        } else {
            require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
        }

    }

    public function OneMovie($namePage, $id)
    {
        $Movie = new Movie();
        $dataOneMovie = $Movie -> getOneMovie($id);
        if($namePage == "panel" or $namePage == "updateFilm"){
            require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
        } else {
            require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
        }
    }

    public function deleteFilm()
    {
        $id = $_POST['film_id'];
        $name_poster = $_POST['id_poster'];
        $Movie = new Movie();
        $data = $Movie -> delFilm($id, $name_poster);
        Helper::redirect('/admin/panel');
    }

    public function addFilm()
    {
        $name = $_POST['name_film'];
        $name_genre = $_POST['name_genre'];
        $actors = $_POST['actors'];
        $duration = $_POST['duration'];
        $name_ageLimit = $_POST['name_ageLimit'];
        $poster = $_FILES['poster'];
        $filmmaker = $_POST['filmmaker'];
        $country = $_POST['country'];
        $description = $_POST['description'];
        $Movie = new Movie();
        $data = $Movie -> addFilm($name, $name_genre, $poster, $actors, $duration, $name_ageLimit, $filmmaker, $country, $description);
        Helper::redirect('/admin/panel');
    }

    public function redactFilm()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $id_genre = $_POST['id_genre_film'];
        $actors = $_POST['actors_film'];
        $duration = $_POST['duration'];
        $ageLimit = $_POST['ageLimit'];
        $filmmaker_film = $_POST['filmmaker_film'];
        $country_film = $_POST['country_film'];
        $poster = $_FILES['poster'];
        $description = $_POST['description_film'];
        $Movie = new Movie();
        $dataUpdate = $Movie -> updFilm($id, $name, $id_genre, $actors, $duration, $ageLimit, $filmmaker_film, $country_film, $poster, $description);
        Helper::redirect('/admin/panel');
    }

}