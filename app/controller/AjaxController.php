<?php

class AjaxController
{
    public function imageCount(){
        $sql = 'select count(id) as numberOfImages from images';
        $images = App::get('database')->fetch($sql);

        if($images->numberOfImages == 0){
            echo 'there are no images';
        }else{
            echo 'There are <b>' . $images->numberOfImages . '</b> images in gallery';
        }
    }
}