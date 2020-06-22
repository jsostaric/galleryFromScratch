<?php

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        self::$registry[$key] = $value;
    }

    public static function get($key)
    {
        return self::$registry[$key];
    }
}