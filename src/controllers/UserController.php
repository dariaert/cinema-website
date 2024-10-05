<?php

namespace App\controllers;

use App\models\User;
use core\services\Helper;
use core\view\View;

class UserController
{

    public $view;
    public $users;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../views');
        $this->users = new User();
    }

    public function register()
    {
        $name = $_POST['FIO'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $this->users->registerUser($name, $email, $password, $password_confirmation);
        Helper::redirect('/login');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $this->users->loginUser($email, $password);
        Helper::redirect('/');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        Helper::redirect('/');
    }

}