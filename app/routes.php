<?php

//route to public available pages
$router->get('', 'PagesController@index');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');

//login, register and logout
$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');
$router->get('logout', 'AuthController@logout');

//routes to gallery pages
$router->get('private/index', 'GalleryController@index');