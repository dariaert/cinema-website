<?php

use router\Router;

Router::myGet('/','home');
Router::myGet('/about.php', 'about');
Router::myGet('/login', 'login');
Router::myGet('/register', 'register');
Router::myGet('/profile', 'profile');
Router::myGet('/favourites', 'favourites');
Router::myGet('/schedule', 'schedule');
Router::myGet('/booking', 'booking');
Router::myGet('/admin/panel', 'panel');
Router::myGet('/admin/genre', 'genre');
Router::myGet('/admin/show', 'show');
Router::myGet('/admin/updateGenre.php', 'updateGenre');
Router::myGet('/admin/updateShow.php', 'updateShow');
Router::myGet('/admin/updateFilm.php', 'updateFilm');
Router::myPost('/auth/register', \core\controllers\UserController::class, 'register');
Router::myPost('/auth/login', \core\controllers\UserController::class, 'login');
Router::myPost('/auth/logout', \core\controllers\UserController::class, 'logout');
Router::myPost('/content/genre/delete', \core\controllers\GenreController::class, 'deleteGenre');
Router::myPost('/content/film/delete', \core\controllers\MovieController::class, 'deleteFilm');
Router::myPost('/content/show/delete', \core\controllers\ShowController::class, 'deleteShow');
Router::myPost('/content/favourite/delete', \core\controllers\FavouritesController::class, 'deleteFavourite');
Router::myPost('/content/genre/add', \core\controllers\GenreController::class, 'addGenre');
Router::myPost('/content/film/add', \core\controllers\MovieController::class, 'addFilm', true, true);
Router::myPost('/content/show/add', \core\controllers\ShowController::class, 'addShow');
Router::myPost('/content/favourite/add', \core\controllers\FavouritesController::class, 'addFavourite');
Router::myPost('/content/genre/redact', \core\controllers\GenreController::class, 'redactGenre');
Router::myPost('/content/show/redact', \core\controllers\ShowController::class, 'redactShow');
Router::myPost('/content/film/redact', \core\controllers\MovieController::class, 'redactFilm', true, true);
Router::myPost('/booking/seat', \core\controllers\TicketController::class, 'bookingSeat');
Router::getContent();