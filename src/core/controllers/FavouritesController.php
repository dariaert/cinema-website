<?php

namespace core\controllers;

use App\view\View;
use core\models\Favourites;
use services\Helper;

class FavouritesController
{

    public $view;
    public $favourites;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../views');
        $this->favourites = new Favourites();
    }

    public function AllFav($namePage)
    {
        return $this->view->render("pages/$namePage.php", ['AllFav' => $this->favourites->getAllFav()]);
    }

    public function addFavourite()
    {
        $id_film = $_POST['id'];
        $this->favourites->addFav($id_film);
        Helper::redirect('/about.php?id=' . $id_film);
    }

    public function deleteFavourite()
    {
        $id = $_POST['id'];
        $this->favourites->delFav($id);
        Helper::redirect('/favourites');
    }

}