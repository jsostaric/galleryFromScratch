<?php

class AuthController
{
    public function login()
    {
        $view = new View();

        $user = Auth::login();

        if($user != null){
            Session::getInstance()->login();
            Session::getInstance()->setuser($user);

            if(!empty(Request::post('remember'))){
                Cookie::set();
            }

            header('Location: private/index');
        }else{
            $view->render('login', [
                'message' => 'Incorrect Credentials'
            ]);
        }
    }

    public function register()
    {
        $view = new View();

        $data = $this->validate($_POST);

        if($data === false){
            $message = 'Something went wrong. Please try again';
            $view->render('register', compact('message'));
        } else{
            User::insert($data);

            $success = 'Thank you for registering. You can now log in';

            $view->render('login', compact('success'));
        }
    }

    public function logout()
    {
        $user = Session::getInstance()->getUser();

        $userToken = App::get('database')->fetch('select * from auth_tokens where users_id = :users_id', [
            'users_id' => $user->id
        ]);

        if(!empty($userToken)){
            Cookie::unset($user->id, $userToken->selector, $userToken->validator);
        }

        Session::getInstance()->logout();

        header('Location: /');
    }

    public function validate($data)
    {
        $required = ['username', 'email', 'password', 'passwordRepeat'];

        foreach ($required as $key) {
            if(!isset($data[$key])){
                return false;
            }

            $data[$key] = trim($data[$key]);
            if(empty($data[$key])){
                return false;
            }
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return false;
        }

        if($data['password'] != $data['passwordRepeat']){
            return false;
        }

        return $data;
    }
}