<?php

//route to public available pages
$router->get('', 'PagesController@index');
$router->get('login', 'PagesController@login');
$router->get('register', 'PagesController@register');