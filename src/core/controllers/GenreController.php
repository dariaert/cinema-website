<?php

namespace core\controllers;

use App\view\View;
use core\models\Genre;
use services\Helper;

class GenreController
{

    public $view;
    public $genres;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->genres = new Genre();
    }

    public function AllGenre($namePage)
    {
        return $this->view->render("pages/admin/$namePage.php", ['AllGenre' => $this->genres->getAllGenre()]);
    }

    public function OneGenre($namePage, $id)
    {
        return $this->view->render("pages/admin/$namePage.php", ['OneGenre' => $this->genres->getOneGenre($id)]);
    }

    public function addGenre()
    {
        $name = $_POST['genre'];
        $this->genres->addGenre($name);
        Helper::redirect('/admin/genre');
    }

    public function deleteGenre()
    {
        $id = $_POST['id'];
        $this->genres->delGenre($id);
        Helper::redirect('/admin/genre');
    }

    public function redactGenre()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $this->genres->updGenre($id, $name);
        Helper::redirect('/admin/genre');
    }

}