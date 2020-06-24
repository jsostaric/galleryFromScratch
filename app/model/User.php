<?php


class User
{
    public static function insert($data)
    {
        $password = password_hash(
            base64_encode(
                hash('sha256', $data['password'], true)
            ),PASSWORD_DEFAULT
        );

        $sql = 'insert into users(username, email, password)
                    values(:username, :email, :password)';

        App::get('database')->fetch($sql, [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $password
        ]);
    }
}