<?php

session_start();

require __DIR__ . "/src/services/Connect.php";
require __DIR__ . "/src/services/Helper.php";
require __DIR__ . "/src/core/controllers/UserController.php";
require __DIR__ . "/src/core/controllers/MovieController.php";
require __DIR__ . "/src/core/controllers/GenreController.php";
require __DIR__ . "/src/core/controllers/ShowController.php";
require __DIR__ . "/src/core/controllers/FavouritesController.php";
require __DIR__ . "/src/core/controllers/ScheduleController.php";
require __DIR__ . "/src/core/controllers/TicketController.php";
require __DIR__ . "/src/core/models/User.php";
require __DIR__ . "/src/core/models/Movie.php";
require __DIR__ . "/src/core/models/Genre.php";
require __DIR__ . "/src/core/models/Show.php";
require __DIR__ . "/src/core/models/Favourites.php";
require __DIR__ . "/src/core/models/Schedule.php";
require __DIR__ . "/src/core/models/Ticket.php";
require __DIR__ . "/src/router/Router.php";
require __DIR__ . "/src/routers.php";