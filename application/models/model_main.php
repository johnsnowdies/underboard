<?php
class Model_Main extends Model{
	
	public function utf8_substr($str,$start){
		preg_match_all("/./su", $str, $ar);
	
		if(func_num_args() >= 3) {
			$end = func_get_arg(2);
			return join("",array_slice($ar[0],$start,$end));
		} else {
			return join("",array_slice($ar[0],$start));
		}
	}
	
	function make_clickable($text){
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
	
		return $ret;
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

    				$body = $this->make_clickable($body);
    					
    				// Цитаты
    				$body = preg_replace('/^>.*/m', '<span class="quote">$0</span>', $body);
    					
    				// Разметка
    				$body = preg_replace('/\[b\](.*?)\[\/b\]/', '<b>$1</b>',$body);
    				$body = preg_replace('/\[i\](.*?)\[\/i\]/', '<i>$1</i>',$body);
    				$body = preg_replace('/\[irony\](.*?)\[\/irony\]/', '<span class="irony">$1</span>',$body);
    				$body = preg_replace('/\[spoiler\](.*?)\[\/spoiler\]/', '<span class="spoiler">$1</span>',$body);
    				
    				
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
