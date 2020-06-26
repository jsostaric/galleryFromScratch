<?php

class Gallery
{
    public static function store($data)
    {
        $filename = self::sanitize($data);

        if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
            $sql = 'insert into images(users_id, name)
                values(:users_id, :name)';

            App::get('database')->fetch($sql, [
                'users_id' => Session::getInstance()->getUser()->id,
                'name' => $filename
            ]);
        }
    }

    public static function sanitize($data)
    {
        $imageName = $data['image']['name'];
        $extension = explode('.', $imageName);
        $imageExtension = strtolower(end($extension));

        $uploadDir = 'app/uploads/';
        $uploadFile = $uploadDir . uniqid('image_') . '.'. $imageExtension;

        return $uploadFile;
    }

    public static function checkOwner($data)
    {
        $message = '';
        $imageId = $data['imageId'];
        $user = App::get('database')->fetch('select * from images where id = :imageId', [
            'imageId' => $imageId
        ]);

        if($user->users_id != Session::getInstance()->getUser()->id){
            $message = 'You can\'t delete this picture';
        }

        return $message;
    }

    public static function removeImage()
    {
        $image = App::get('database')->fetch('select * from images where id = :imageId', [
            'imageId' => Request::post('imageId')
        ]);

        unlink($image->name);
        App::get('database')->fetch('delete from images where id = :imageId', [
            'imageId' => $image->id
        ]);
    }
}