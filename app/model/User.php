<?php


class User
{
    public static function insert($data)
    {
        $password = password_hash(
            base64_encode(
                hash('sha256', $data['password'], true)
            ),
            PASSWORD_DEFAULT
        );

        $sql = 'insert into users(username, email, password)
                    values(:username, :email, :password)';

        App::get('database')->fetch($sql, [
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $password
        ]);
    }

    public function passwordCheck($data)
    {
        $message = '';
        $oldPassword = trim($data['oldPassword']);
        $password = trim($data['password']);
        $confirmPassword = trim($data['confirmPassword']);
        $id = $data['id'];

        if (empty($oldPassword) || empty($password) || empty($confirmPassword)) {
                $message = 'All fields must be filled';
        }

        if(!password_verify(
            base64_encode(
                hash('sha256', $oldPassword, true)
            ),
            Session::getInstance()->getUser()->password
        )) {
            $message = 'Old password does not match';
        }

        if(password_verify(
            base64_encode(
                hash('sha256', $password, true)
            ),
            Session::getInstance()->getUser()->password
        )) {
            $message = 'New password cannot be same as old.';
        }

        if($password != $confirmPassword) {
            $message = 'You must repeat password correctly';
        }

        return $message;
    }

    public function updatePassword($data)
    {
        $password = password_hash(
            base64_encode(
                hash('sha256', $data['password'], true)
            ),
            PASSWORD_DEFAULT
        );

        $sql = 'update users set password = :password where id = :id';
        App::get('database')->fetch($sql, [
            'password' => $password,
            'id' => $data['id']
        ]);
    }

    public function remove(){
        $uid = Session::getInstance()->getUser()->id;

        $images = App::get('database')->fetchAll('select * from images where users_id = :uid', [
            'uid' => $uid
        ]);

        foreach($images as $image){
            unlink($image->name);
        }

        App::get('database')->fetch('delete from users where id = :uid', [
            'uid' => $uid
        ]);

    }
}