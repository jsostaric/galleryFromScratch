<?php

class Auth
{
    public static function login()
    {
        $email = Request::post('email');
        $password = Request::post('password');

        $user = App::get('database')->fetch('select * from users where email = :email', [
            'email' => $email
        ]);

        if(!empty($user->email)){
            if(password_verify(
                base64_encode(
                    hash('sha256', $password, true)
                ),
                $user->password
            )){
                return $user;
            }
        }
    }
}