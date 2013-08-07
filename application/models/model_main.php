<?php
class Model_Main extends Model
{
	public function utf8_substr($str,$start)
	{
		preg_match_all("/./su", $str, $ar);
	
		if(func_num_args() >= 3) {
			$end = func_get_arg(2);
			return join("",array_slice($ar[0],$start,$end));
		} else {
			return join("",array_slice($ar[0],$start));
		}
	}
    
    public function get_threads($page){
    	$request = new Request();
    	$page = $page * 10;
		    	
    	$sth = $this->DBH->prepare('SELECT `id`,`title`,`body`,`author`,`timestamp`,`parent`,`mime`,`count`,`last_update` FROM `posts` WHERE `parent` = 0 ORDER BY `last_update` DESC LIMIT :page, 10');
    	$sth->bindParam('page',$page,PDO::PARAM_INT);
    	$sth->execute();
    	
    	$sth = $sth->fetchAll(PDO::FETCH_ASSOC);
    	
    	$threads = array();
    	
    	foreach ($sth as $key => $value){
    		$threads[$key] = new stdClass();
    		foreach ($value as $innerKey => $innerValue){
    			if($innerKey == 'body'){
    				// Перенос строки
    				$body = nl2br($innerValue);
    				// Цитаты
    				$body = preg_replace('/^>.*/m', '<span class="quote">$0</span>', $body);
    				
    				if (strlen($body) > 500){
    					$body = $this->utf8_substr($body,0,500);
    					$id = $threads[$key]->id;
    					$body = $body.'...<br/><a href="/thread/show/'.$id.'">Показать полностью</a>';
    				}
    				$threads[$key]->$innerKey = $body;
    			}
    			else
    				$threads[$key]->$innerKey = $innerValue;
    		}
    	}
 
    	return $threads;
    }
    
    public function get_pages_count(){
    	$sth = $this->DBH->query('SELECT COUNT(*) AS `count` FROM `posts` WHERE parent = 0');
    	$result = $sth->fetch();
    	$pages = $result['count']/10;
    	//ceil — Округляет дробь в большую сторону
    	return 	ceil($pages); 
    }
}

?>
