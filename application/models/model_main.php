<?php
class Model_Main extends Model
{
    
    public function get_threads($page){
    	
    $page = $page * 10;
		$this->DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);    	
    	$sth = $this->DBH->prepare('SELECT * FROM `posts` WHERE `parent` = 0 ORDER BY `last_update` DESC LIMIT '.$page.', 10');
    	$sth->execute();
    	
    	return $sth;
    }
    
    public function get_total_threads(){
    	$sth = $this->DBH->query('SELECT COUNT(*) AS `count` FROM `posts` WHERE parent = 0 ');
    	$result = $sth->fetch();
    	$pages = $result['count']/10;
    	return 	ceil($pages);
    }
}

?>
