<?php
class Model_Thread extends Model
{
    public function get_data()
    {	
    	
    }

    public function get_thread($thread){
    	// Выбираем ОП пост
    	$op = $this->DBH->prepare('SELECT * FROM `posts` WHERE `id` = :parent');
    	$op->execute(array('parent' => $thread));

        // Выбираетм все посты
    	$body = $this->DBH->prepare('SELECT * FROM `posts` WHERE `parent` = :parent');
        $body->execute(array('parent' => $thread));
       
        $result = array('opener' => $op, 'postbody' => $body);
        return $result;
    }
}
?>