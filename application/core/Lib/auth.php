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
}
