<?php
class Request{
	public $post;
	public $get;
	public $files;
	public $session;
	public $server;

	function __construct(){
		$this->post = new stdClass();
		foreach ($_POST as $key => $value)
			$this->post->$key = $value;
		
		$this->get = new stdClass();
		foreach ($_GET as $key => $value)
			$this->get->$key = $value;
		
		$this->files = new stdClass();
		foreach ($_FILES as $key => $value){	
			$this->files->$key = new stdClass();
			foreach ($value as $innerKey => $innerValue)
				$this->files->$key->$innerKey = $innerValue;
		}
		
		$this->session = new stdClass();
		foreach ($_SESSION as $key => $value)
			$this->session->$key = $value;
		
		$this->server = new stdClass();
		foreach ($_SERVER as $key => $value)
			$this->server->$key = $value;
	}
	
}