<?php
class Model_Main extends Model
{
    public function get_data()
    {	
    	$sth = $this->DBH->query('SELECT *
    								FROM `posts`
    								WHERE `parent` = 0');
        return $sth;
    }
}
?>