<?php
class Model_Auth extends Model
{
    public function check_user($email,$password)
    {	
    	$sth = $this->DBH->prepare('SELECT `login`
    								FROM `users`
    								WHERE `password` = :password');
		$sth->execute(array('password' => md5($password)));

		$result = $sth->fetch(PDO::FETCH_ASSOC);
		if ($result['login'] == $email) $result = true; else $result = false;

        return $result;
    }
}
?>