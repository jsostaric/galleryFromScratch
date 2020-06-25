<?php

class PagesController
{
    public function index(){
        $view = new View;

        if(isset($_COOKIE['selector'])){
            $userToken = App::get('database')->fetch(
                'select * from auth_tokens where selector = :selector', [
                    'selector' => $_COOKIE['selector']
            ]);
            $selector = $userToken->selector;
            if(!empty($selector)){
                if(hash_equals($userToken->validator, $_COOKIE['validator'])){
                    header('Location: private/index');
                }
            }
        }

        return $view->render('index');
    }

    public function login()
    {
        $view = new View;

        if(Session::getInstance()->isLoggedIn()){
            header('Location: private/index');
        }

        $view->render('login');
    }

    public function register()
    {
        $view = new View;

        if(Session::getInstance()->isLoggedIn()){
            header('Location: private/index');
        }

        $view->render('register');
    }
}