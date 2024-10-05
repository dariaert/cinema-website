<?php

namespace core\router;

use App\controllers\FavouritesController;
use App\controllers\GenreController;
use App\controllers\MovieController;
use App\controllers\ScheduleController;
use App\controllers\ShowController;
use App\controllers\TicketController;

class Router
{

    public static $list = [];

    public static function myGet(string $url, string $namePage)
    {
        self::$list[] = [
            'url' => $url,
            'namePage' => $namePage
        ];
    }

    public static function myPost(string $url, string $controller, string $method)
    {
        self::$list[] = [
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function getContent()
    {
        $rout = $_GET['rout'] ?? '';
        foreach (self::$list as $item)
        {
            if($item['url'] === '/' . $rout)
            {
                if ($_SERVER['REQUEST_METHOD'] === "GET")
                {
                    $Movie = new MovieController();
                    $Genre = new GenreController();
                    $Show = new ShowController();
                    $Favourites = new FavouritesController();
                    $Schedule = new ScheduleController();
                    $Ticket = new TicketController();
                    switch ($item['namePage'])
                    {
                        case 'home':
                            $Movie -> AllMovie($item['namePage']);
                            die();
                        case 'login':
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            die();
                        case 'register':
                            require_once __DIR__ . '/../../views/pages/' . $item['namePage'] . '.php';
                            die();
                        case 'about':
                            $Movie -> OneMovie($item['namePage'], $_GET['id']);
                            die();
                        case 'profile':
                            $Ticket -> AllTicket($item['namePage']);
                            die();
                        case 'schedule':
                            $Schedule -> AllDate($item['namePage']);
                            die();
                        case 'booking':
                            $Schedule -> OneShow($item['namePage'], $_GET['id_show']);
                            die();
                        case 'favourites':
                            $Favourites -> AllFav($item['namePage']);
                            die();
                        case 'updateGenre':
                            $Genre -> OneGenre($item['namePage'], $_GET['id']);
                            die();
                        case 'updateFilm':
                            $Movie -> OneMovie($item['namePage'], $_GET['id']);
                            die();
                        case 'updateShow':
                            $Show -> OneShow($item['namePage'], $_GET['id']);
                            die();
                        case 'panel':
                            $Movie -> AllMovie($item['namePage']);
                            die();
                        case 'genre':
                            $Genre -> AllGenre($item['namePage']);
                            die();
                        case 'show':
                            $Show -> AllShow($item['namePage']);
                            die();
                    }
                }
                elseif ($_SERVER['REQUEST_METHOD'] === "POST")
                {
                    $method = $item['method'];
                    $action = new $item['controller'];
                    $action->$method($_POST);
                    die();
                }
            }
        }
    }

}