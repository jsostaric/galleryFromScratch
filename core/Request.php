<?php

class Request
{
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function get($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : '';
    }

    public static function post($key)
    {
        return isset($_POST[$key]) ? $_POST[$key] : '';
    }
}