<?php

namespace core\controllers;

use App\view\View;
use core\models\Movie;
use services\Helper;

class MovieController
{

    public $view;
    public $movies;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->movies = new Movie();
    }

    public function AllMovie($namePage)
    {
        if($namePage == "panel"){
            return $this->view->render("pages/admin/$namePage.php", ['dataAllMovie' => $this->movies->getAllMovie()]);
        } else {
            return $this->view->render("pages/$namePage.php", ['dataAllMovie' => $this->movies->getAllMovie()]);
        }

    }

    public function OneMovie($namePage, $id)
    {
        if($namePage == "panel" or $namePage == "updateFilm"){
            return $this->view->render("pages/admin/$namePage.php", ['dataOneMovie' => $this->movies->getOneMovie($id)]);
        } else {
            return $this->view->render("pages/$namePage.php", ['dataOneMovie' => $this->movies->getOneMovie($id)]);
        }
    }

    public function deleteFilm()
    {
        $id = $_POST['film_id'];
        $name_poster = $_POST['id_poster'];
        $this->movies->delFilm($id, $name_poster);
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
        $this->movies->addFilm($name, $name_genre, $poster, $actors, $duration, $name_ageLimit, $filmmaker, $country, $description);
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
        $this->movies->updFilm($id, $name, $id_genre, $actors, $duration, $ageLimit, $filmmaker_film, $country_film, $poster, $description);
        Helper::redirect('/admin/panel');
    }

}