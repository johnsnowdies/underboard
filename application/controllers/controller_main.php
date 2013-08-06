<?php
class Controller_Main extends Controller
{
    function __construct(){
        $this->model   = new Model_Main();
        $this->view    = new View();
        $this->request = new Request();
    }

    function action_index(){
    	if (!empty($this->request->session->user)){
    		if ($this->request->session->uid == $this->model->check_uid($this->request->session->user)){
    			
    			$posts 	 = $this->model->get_total_threads();
    			$content = $this->model->get_threads(0);
    			$data 	 = array('data'=>$content, 'posts'=> $posts, 'current' => 0);
    			
    			$this->view->generate('main_view.php', 'template_view.php', $data);
    		}
    	}else
    		$this->view->generate('login_view.php', 'template_view.php');
    }

    function action_bad(){
        if (!isset($this->request->session->user)){
			
        } else self::action_index();
    }

    function action_page($page){
    	if (!empty($this->request->session->user)){
    		if ($this->request->session->uid == $this->model->check_uid($this->request->session->user)){
    			
    			$posts 	 = $this->model->get_total_threads();
    			$content = $this->model->get_threads($page);
    			$data 	 = array('data'=>$content, 'posts'=> $posts, 'current' => $page);
    			
    			$this->view->generate('main_view.php', 'template_view.php', $data);
    		}
    	}else
    		$this->view->generate('login_view.php', 'template_view.php');
    }
}