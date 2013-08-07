<?php
class Model_Thread extends Model
{
    public function get_data()
    {

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
					// Цитаты
					$body = preg_replace('/^>.*/m', '<span class="quote">$0</span>', $body);
					// Иерархические ссылки
					$body = preg_replace('/\#(\w+)/', '<a class="navlink" href="'.$request->server->REQUEST_URI.'#$1">#$1</a>',$body);
        			$thread[$key]->$innerKey = $body;
				}
				else 
					$thread[$key]->$innerKey = $innerValue;
        	}
        }

        return $thread;
    }
}