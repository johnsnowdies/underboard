<?php
class Controller_Reply extends Controller
{
	function __construct()
	{
		$this->model = new Model_Reply();
		$this->view = new View();
	}

    function action_index()
    {	
    	if (isset($_POST['author'])){
            $this->model->insert_Reply($_POST['title'],$_POST['body'],$_POST['author']);
            header('Location: /');
        }
    }

}
?>