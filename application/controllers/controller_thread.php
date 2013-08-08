<?php
class Controller_Thread extends Controller
{
    function __construct(){
        $this->model 	= new Model_Thread();
        $this->view 	= new View();
		$this->request  = new Request();       
    }

    function action_index(){
		  if (Auth::isAuth()){

		  	$extars = 'http://' . $this->request->server->SERVER_NAME . '/reply';
		  	$this->view->generate('new_thread_view.php','template_view.php',$extars);
		  }else
		  	Route::ErrorPage404();
    }

    function action_show($id){
        if (Auth::isAuth()) {
            $data = $this->model->get_thread($id);
            // Проверяем, является ли этот тред корневым, и существует ли он вообще
            if (count($data) == 0 || $data[0]->parent != 0) 
            	Route::ErrorPage404();
           	else{
           		$extars = new stdClass();
           		$extars->postReply = 'http://' . $this->request->server->SERVER_NAME . '/reply';
           		
            	$this->view->generate('thread_view.php', 'template_view.php', $data,$id,$extars);
           	}
        } else
            Route::ErrorPage404();
    }
}