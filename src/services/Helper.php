<?php

namespace services;

session_start();

class Helper
{

    public static function redirect(string $path)
    {
        header("location: $path");
        die();
    }

    public static function setValidationError(string $fieldName, string $message)
    {
        $_SESSION['validation'][$fieldName] = $message;
    }

    public static function hasValidationError(string $fieldName): bool
    {
        return isset($_SESSION['validation'][$fieldName]);
    }

    public static function validationErrorAttr(string $fieldName): string
    {
        return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
    }

    public static function validationErrorMessage(string $fieldName)
    {
        $message = $_SESSION['validation'][$fieldName] ?? '';
        unset($_SESSION['validation'][$fieldName]);
        return $message;
    }

    public static function setOldValue(string $key, mixed $value)
    {
        $_SESSION['old'][$key] = $value;
    }

    public static function old(string $key)
    {
        $value = $_SESSION['old'][$key] ?? '';
        unset($_SESSION['old'][$key]);
        return $value;
    }

    public static function setMessage(string $key, string $message): void
    {
        $_SESSION['message'][$key] = $message;
    }

    public static function hasMessage(string $key): bool
    {
        return isset($_SESSION['message'][$key]);
    }

    public static function getMessage(string $key): string
    {
        $message = $_SESSION['message'][$key] ?? '';
        unset($_SESSION['message'][$key]);
        return $message;
    }

    public static function checkUser(): void
    {
        if(isset($_SESSION["user"]["id"])){
            self::redirect('/');
        }
    }

}