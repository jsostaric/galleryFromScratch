<?php

//route to public available pages
$router->get('', 'PagesController@index');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');

//login, register and logout
$router->post('login', 'AuthController@login');
$router->post('register', 'AuthController@register');
$router->get('logout', 'AuthController@logout');

//routes to users pages
$router->get('private/myAccount', 'UsersController@show');
$router->get('private/edit', 'UsersController@edit');
$router->post('private/update', 'UsersController@update');
$router->post('delete', 'UsersController@destroy');

//routes to gallery pages
$router->get('private/index', 'GalleryController@index');
$router->post('private/store', 'GalleryController@store');
$router->post('private/delete', 'GalleryController@destroy');
