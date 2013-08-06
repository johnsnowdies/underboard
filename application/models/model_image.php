<?php
class Model_Image extends Model
{
    public function get_data()
    {

    }

    public function get_image($id)
    {
        $image = $this->DBH->prepare('SELECT `image_big` FROM `posts` WHERE `id` = :id');
        $image->execute(array('id' => $id));
        return $image;
    }
}