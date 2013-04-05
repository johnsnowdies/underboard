<?php
class Model_Service extends Model
{
	public function dislike($user,$thread){
		$sth = $this->DBH->prepare('UPDATE `posts` SET `dislikes`=`dislikes` + 1 WHERE `id`=:thread;');
		$sth->execute(array('thread' => $thread));
	
		$sth = $this->DBH->prepare('INSERT INTO `dislikes`(`user`,`post`) VALUES(:user,:thread);');
		$sth->execute(array('user' => $user, 'thread' => $thread));
	}
	
	public function revert_dislike($user,$thread){
		$sth = $this->DBH->prepare('UPDATE `posts` SET `dislikes`=`dislikes` - 1 WHERE `id`=:thread;');
		$sth->execute(array('thread' => $thread));
	
		$sth = $this->DBH->prepare('DELETE FROM `dislikes` WHERE `post`=:thread AND `user`=:user');
		$sth->execute(array('thread'=>$thread , 'user' => $user ));
	}
	
	public function  get_state($user,$thread){
		$sth = $this->DBH->prepare('SELECT `id` FROM `dislikes` WHERE `post`=:thread AND `user`=:user;');
		$sth->execute(array('thread' => $thread, 'user' => $user));
		return $sth;
	}
}