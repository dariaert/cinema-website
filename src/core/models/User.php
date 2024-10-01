<?php

namespace core\models;

use services\Connect;
use services\Helper;

class User
{

    public function registerUser($name, $email, $password, $password_confirmation)
    {

        if(empty($name)){
            Helper::setValidationError('FIO', 'Неверное имя');
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Helper::setValidationError('email', 'Указана неправильная почта');
        }

        if(empty($password))
        {
            Helper::setValidationError('password', 'Пароль пустой');
        }

        if($password !== $password_confirmation)
        {
            Helper::setValidationError('password', 'Пароли не совпадают');
        }

        if(!empty($_SESSION['validation']))
        {
            Helper::setOldValue('FIO', $name);
            Helper::setOldValue('email', $email);
            Helper::redirect('/register');
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = Connect::Connect()->query("INSERT INTO `user`(`id`, `FIO`, `email`, `password`) VALUES (NULL,'$name','$email','$password')");
    }

    public function loginUser($email, $password)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Helper::setOldValue('email', $email);
            Helper::setValidationError('email', 'Неверный формат электронной почты');
            Helper::setMessage('error', 'Ошибка валидации');
            Helper::redirect('/login');
        }
        $query = Connect::Connect()->query("SELECT * FROM `user` WHERE email = '$email'");
        $user = mysqli_fetch_assoc($query);
        if(!$user){
            Helper::setMessage('error', "Пользователь $email не найден");
            Helper::redirect('/login');
        }

        if (!password_verify($password, $user['password']))
        {
            Helper::setMessage('error', "Неверный логин или пароль");
            Helper::redirect('/login');
        }

        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION["user"] = [
              'id' => $user['id'],
              'name' => $user['FIO'],
              'email' => $user['email'],
              'password' => $user['password'],
              'role' => $user['role']
            ];
        }
    }

}