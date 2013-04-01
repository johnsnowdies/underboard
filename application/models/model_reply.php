<?php
class Model_Reply extends Model
{
    public function insert_Reply($title,$body,$author)
    {	
    	$sth = $this->DBH->prepare('INSERT INTO `posts`(`title`, `body`, `author`, `parent`) VALUES (:title, :body, :author, 0);');
		$sth->execute(array('title' => $title,'body' => $body, 'author' => $author));
    }
}
?>