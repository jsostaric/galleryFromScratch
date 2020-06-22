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



Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());