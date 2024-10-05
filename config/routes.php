<?php

use core\router\Router;

// GET
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

// POST
Router::myPost('/auth/register', \App\controllers\UserController::class, 'register');
Router::myPost('/auth/login', \App\controllers\UserController::class, 'login');
Router::myPost('/auth/logout', \App\controllers\UserController::class, 'logout');

Router::myPost('/content/genre/delete', \App\controllers\GenreController::class, 'deleteGenre');
Router::myPost('/content/film/delete', \App\controllers\MovieController::class, 'deleteFilm');
Router::myPost('/content/show/delete', \App\controllers\ShowController::class, 'deleteShow');
Router::myPost('/content/favourite/delete', \App\controllers\FavouritesController::class, 'deleteFavourite');

Router::myPost('/content/genre/add', \App\controllers\GenreController::class, 'addGenre');
Router::myPost('/content/film/add', \App\controllers\MovieController::class, 'addFilm');
Router::myPost('/content/show/add', \App\controllers\ShowController::class, 'addShow');
Router::myPost('/content/favourite/add', \App\controllers\FavouritesController::class, 'addFavourite');

Router::myPost('/content/genre/redact', \App\controllers\GenreController::class, 'redactGenre');
Router::myPost('/content/show/redact', \App\controllers\ShowController::class, 'redactShow');
Router::myPost('/content/film/redact', \App\controllers\MovieController::class, 'redactFilm');
Router::myPost('/booking/seat', \App\controllers\TicketController::class, 'bookingSeat');

Router::getContent();