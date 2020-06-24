<?php

class GalleryController
{
    public function index()
    {
        $view = new View();

        $view->render('private/index');
    }
}