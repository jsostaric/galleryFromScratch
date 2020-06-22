<?php

class View
{
    public function render($name, $data = [])
    {
        extract($data);

        return include "app/view/{$name}.php";
    }
}