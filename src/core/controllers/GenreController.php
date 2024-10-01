<?php

namespace core\controllers;

use core\models\Genre;
use services\Helper;

class GenreController
{

    public function AllGenre($namePage)
    {
        $Genre = new Genre();
        $dataAllGenre = $Genre -> getAllGenre();
        require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
    }

    public function OneGenre($namePage, $id)
    {
        $Genre = new Genre();
        $dataOneGenre = $Genre ->getOneGenre($id);
        require_once __DIR__ . '/../../../views/pages/admin/' . $namePage . '.php';
    }

    public function addGenre()
    {
        $name = $_POST['genre'];
        $Genre = new Genre();
        $data = $Genre -> addGenre($name);
        Helper::redirect('/admin/genre');
    }

    public function deleteGenre()
    {
        $id = $_POST['id'];
        $Genre = new Genre();
        $data = $Genre -> delGenre($id);
        Helper::redirect('/admin/genre');
    }

    public function redactGenre()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $Genre = new Genre();
        $data = $Genre -> updGenre($id, $name);
        Helper::redirect('/admin/genre');
    }

}