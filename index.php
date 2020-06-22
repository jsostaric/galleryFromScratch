<?php

define('ROOT', __DIR__ . '/');

set_include_path(implode(PATH_SEPARATOR, [
    ROOT . 'app/controller',
    ROOT . 'app/model',
    ROOT . 'core',
    ROOT . 'core/database'
]));

spl_autoload_register(function($class){
    $path = strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
    return include $path;
});

App::bind('config', require 'app/config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());