<?php

class Session
{
    protected static $instance;

    private function __construct()
    {
        session_start();
    }

    public function login()
    {
        $_SESSION['login'] = true;
    }

    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['session']);
    }

    public function isLoggedIn()
    {
        $isLoggedIn = isset($_SESSION['login']) ? true : false;

        return $isLoggedIn;
    }

    public function setUser($user)
    {
        $_SESSION['session'][0] = $user;

        return $user;
    }

    // public function unsetUser()
    // {
    //     return $_SESSION['session'][0] = "";
    // }

    public function getUser()
    {
        $getUser = $_SESSION['session'][0];

        return $getUser;
    }

    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance = new self;
        }

        return self::$instance;
    }
}