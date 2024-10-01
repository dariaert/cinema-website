<?php

namespace core\controllers;

use core\models\User;
use services\Helper;

class UserController
{

    public function register()
    {
        $name = $_POST['FIO'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        $User = new User();
        $User -> registerUser($name, $email, $password, $password_confirmation);
        Helper::redirect('/login');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $User = new User();
        $User -> loginUser($email, $password);
        Helper::redirect('/');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        Helper::redirect('/');
    }

}