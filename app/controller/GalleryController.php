<?php

class GalleryController
{
    public function index()
    {
        if(!Session::getInstance()->isLoggedIn()){
            header('Location: ../login');
        }

        $sql = 'select a.id, a.name, b.id as uid, b.username, b.email
            from images a
            inner join users b on a.users_id = b.id';

        $images = App::get('database')->fetchAll($sql);

        $isLoggedIn = Session::getInstance()->isLoggedIn();

        $view = new View();

        $view->render('private/index', compact(
            'images',
            'isLoggedIn'
        ));
    }

    public function store()
    {
        $message = $this->validate($_FILES);

        if($message != ''){
            $view = new View;
            $view->render('private/index', compact('message'));
        }else{
            Gallery::store($_FILES);

            header('Location: index');
        }

    }

    public function destroy()
    {
        $message = Gallery::checkOwner($_POST);

        if($message == ''){
            Gallery::removeImage();
        }

        header('Location: /private/index');
    }

    public function validate($data){
        $message = '';
        $imageName = $data['image']['name'];
        $imageTmpName = $data['image']['tmp_name'];
        $imageErr = $data['image']['error'];
        $imageSize = $data['image']['size'];
        $extension = explode('.', $imageName);
        $imageExtension = strtolower(end($extension));

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $imageTmpName);
        finfo_close($finfo);

        if(empty($data)){
            $message = 'File not Found!';
        }

        if($imageSize > 5000000){
            $message = 'File is to big. Can only be up to 5mb.';
        }

        if($imageExtension != 'jpg' && $imageExtension != 'png'){
            $message = 'File must have jpg or png extension.';
        }

        if($mimeType != 'image/jpeg' && $mimeType != 'image/png'){
            $message = 'File must be jpg or png file';
        }

        return $message;
    }
}