<?php
class Model_Image extends Model{
    public function get_data(){}

    public function get_thumb($id){
        $image = $this->DBH->prepare('SELECT `image`,`mime` FROM `posts` WHERE `id` = :id');
        $image->execute(array('id' => $id));
        $image = $image->fetchAll(PDO::FETCH_ASSOC);

        $result = new stdClass();
        foreach ($image[0] as $key => $value){
        	$result->$key = $value;
        }
        
        return $result;
    }
    
    public function get_image($id){
    	$image = $this->DBH->prepare('SELECT `image_big` AS `image`,`mime` FROM `posts` WHERE `id` = :id');
    	$image->execute(array('id' => $id));
    	$image = $image->fetchAll(PDO::FETCH_ASSOC);
    	
    	$result = new stdClass();
        foreach ($image[0] as $key => $value){
        	$result->$key = $value;
        }
        
        return $result;
    }
}