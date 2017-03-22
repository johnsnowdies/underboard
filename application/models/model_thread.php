<?php
class Model_Thread extends Model
{
    public function get_data(){}

    function make_clickable($text)
    {
    	$ret = ' ' . $text;
    	$ret = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
    	$ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $ret);
    	$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
    	$ret = substr($ret, 1);
    
    	return $ret;
    }
    
    public function get_thread($id)
    {
    	$request = new Request();
        // Выбираем ОП пост
        $op = $this->DBH->prepare('SELECT `id`,`title`,`body`,`author`,`timestamp`,`parent`,`mime` FROM `posts` WHERE `id` = :id');
        $op->execute(array('id' => $id));
        
        // Выбираетм все посты
        $body = $this->DBH->prepare('SELECT `id`,`title`,`body`,`author`,`timestamp`,`mime` FROM `posts` WHERE `parent` = :parent ORDER BY `id`');
        $body->execute(array('parent' => $id));

        $res = array_merge($op->fetchAll(PDO::FETCH_ASSOC),$body->fetchAll(PDO::FETCH_ASSOC));

        $thread = array();
        foreach ($res as $key => $value){
        	$thread[$key] = new stdClass();
        	foreach ($value as $innerKey => $innerValue){
				if($innerKey == 'body'){
					// Перенос строки
					$body = nl2br($innerValue);
					
					 
					$body = $this->make_clickable($body);							
					
					// Цитаты
					$body = preg_replace('/^>.*/m', '<span class="quote">$0</span>', $body);
					// Иерархические ссылки
					$body = preg_replace('/\#(\w+)/', '<a class="navlink" href="'.$request->server->REQUEST_URI.'#$1">#$1</a>',$body);
					
					// Разметка
					$body = preg_replace('/\[b\](.*?)\[\/b\]/', '<b>$1</b>',$body);
					$body = preg_replace('/\[i\](.*?)\[\/i\]/', '<i>$1</i>',$body);
					$body = preg_replace('/\[irony\](.*?)\[\/irony\]/', '<span class="irony">$1</span>',$body);
					$body = preg_replace('/\[spoiler\](.*?)\[\/spoiler\]/', '<span class="spoiler">$1</span>',$body);
        			
					$thread[$key]->$innerKey = $body;
				}
				else 
					$thread[$key]->$innerKey = $innerValue;
        	}
        }

        return $thread;
    }
}