<?php 
class Auth{
	static function isAuth(){
		$request = new Request();
		$model   = new Model();
		$auth    = false;
		
		if (!empty($request->session->user)){
			if ($request->session->uid == $model->check_uid($request->session->user)){
				$auth = true; 
			}
		}
		return $auth;
	}
	
	static function setAuth($email, $uid){
		$_SESSION['user'] = $email;
		$_SESSION['uid'] = $uid;
	}
	
	static function unsetAuth(){
		unset($_SESSION['user']);
		unset($_SESSION['uid']);
	}
	
}
