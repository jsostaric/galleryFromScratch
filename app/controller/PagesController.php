<?php

class PagesController
{
    public function index(){
        $view = new View;

        return $view->render('index');
    }

    public function login()
    {
        $view = new View;

        $view->render('login');
    }

    public function register()
    {
        $view = new View;

        $view->render('register');
    }
}