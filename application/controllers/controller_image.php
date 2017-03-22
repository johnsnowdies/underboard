<?php
class Controller_Image extends Controller
{
	function __construct(){
		$this->model = new Model_Image();
		$this->view = new View();
		$this->request = new Request();
	}
	
	function action_index()
	{

	}
	
	function action_show($id){
		if (Auth::isAuth()) {
			$extars = '/image/big/'.$id;
			$this->view->generate('image_view.php', 'template_view.php',null,$id,$extars);
		}else
			Route::ErrorPage404();
	}
	
	function action_big($id){
		if (Auth::isAuth()) {
			$data = $this->model->get_image($id);
			$this->view->generate('image_show.php', 'empty.php', $data, $id);
		} else
			Route::ErrorPage404();
	}
	
	function action_thumb($id){
		if (Auth::isAuth()) {
			$data = $this->model->get_thumb($id);
			$this->view->generate('image_show.php', 'empty.php', $data, $id);
		} else
			Route::ErrorPage404();
	}
	
	
}