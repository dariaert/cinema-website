<?php

namespace core\controllers;

use core\models\Favourites;
use services\Helper;

class FavouritesController
{

    public function AllFav($namePage)
    {
        $Favourites = new Favourites();
        $dataAllFav = $Favourites -> getAllFav();
        require_once __DIR__ . '/../../../views/pages/' . $namePage . '.php';
    }

    public function addFavourite()
    {
        $id_film = $_POST['id'];
        $Favourites = new Favourites();
        $data = $Favourites -> addFav($id_film);
        Helper::redirect('/about.php?id=' . $id_film);
    }

    public function deleteFavourite()
    {
        $id = $_POST['id'];
        $Favourites = new Favourites();
        $data = $Favourites -> delFav($id);
        Helper::redirect('/favourites');
    }

}