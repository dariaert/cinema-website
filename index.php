<?php

session_start();

require __DIR__ . "/core/services/Connect.php";
require __DIR__ . "/core/services/Helper.php";
require __DIR__ . "/core/view/View.php";
require __DIR__ . "/src/controllers/UserController.php";
require __DIR__ . "/src/controllers/MovieController.php";
require __DIR__ . "/src/controllers/GenreController.php";
require __DIR__ . "/src/controllers/ShowController.php";
require __DIR__ . "/src/controllers/FavouritesController.php";
require __DIR__ . "/src/controllers/ScheduleController.php";
require __DIR__ . "/src/controllers/TicketController.php";
require __DIR__ . "/src/models/User.php";
require __DIR__ . "/src/models/Movie.php";
require __DIR__ . "/src/models/Genre.php";
require __DIR__ . "/src/models/Show.php";
require __DIR__ . "/src/models/Favourites.php";
require __DIR__ . "/src/models/Schedule.php";
require __DIR__ . "/src/models/Ticket.php";
require __DIR__ . "/core/router/Router.php";
require __DIR__ . "/config/routes.php";