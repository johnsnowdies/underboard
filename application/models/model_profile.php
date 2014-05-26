<?php
class Model_Profile extends Model
{
    function get_data(){
        $sth = $this->DBH->query('SELECT * FROM posts WHERE parent = 0 ORDER BY `last_update` DESC');
        return $sth;
    }
}