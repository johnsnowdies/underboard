<?php
class Controller_Image extends Controller
{
	function __construct()
	{
		$this->model = new Model_Image();
		$this->view = new View();
		$this->request = new Request();
	}
	
	function action_index()
	{

	}
	
	function action_show($id){
	
		if (!empty($this->request->session->user)) {
			$data = $this->model->get_image($id);
			$this->view->generate('image_view.php', 'template_view.php', $data, $id);
		} else
			header('Location:/');
	}
}