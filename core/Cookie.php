<?php

class Cookie
{
    public static function generateToken($length)
    {
        return bin2hex(random_bytes($length));
    }

    public static function set()
    {
        $uid = Session::getInstance()->getUser()->id;
        $username = Session::getInstance()->getUser()->username;
        $selector = self::generateToken(6);
        $validator = self::generateToken(32);
        $hashedValidator = hash('sha256', $validator);
        $expires = time() + (60*60*24*7);
        $expiryDate = date('Y-m-d H:i:s', $expires);

        setcookie($selector, $hashedValidator, $expires);

        try {
            $sql = "insert into auth_tokens(selector, validator, users_id, expires)
                values(:selector, :validator, :users_id, :expires)";

            App::get('database')->fetch($sql, [
                'selector' => $selector,
                'validator' => $hashedValidator,
                'users_id' => $uid,
                'expires' => $expiryDate
            ]);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function unset($uid, $selector, $validator)
    {
        $sql = "delete from auth_tokens where users_id = :users_id";

        App::get('database')->fetch($sql, [
            'users_id' => $uid
        ]);
        setcookie($selector, $validator, time() - 1);
    }
}