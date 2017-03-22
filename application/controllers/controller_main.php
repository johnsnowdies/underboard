<?php
class Controller_Main extends Controller
{
    function __construct(){
        $this->model   = new Model_Main();
        $this->view    = new View();
        $this->request = new Request();
    }
    
    function make_pagination($pages,$current){
    	$pagelink = '/main/page/';
		
		if ($current > 0) 
    		$pagination[] = array('class'=>'page', 'link' => $pagelink.($current-1), 'value' => '<i class="icon-chevron-left icon-white"></i>');
    	
    	for ($i = 0; $i < $pages; $i++ )
    		if ($i == $current)
    			$pagination[] = array('class'=>'page current','link' => $pagelink.$i, 'value' => $i);
    		else
    			$pagination[] = array('class'=>'page','link' => $pagelink.$i, 'value' => $i);
    	
    	if ($current < ($pages-1))	
    		$pagination[] = array('class'=>'page', 'link' => $pagelink.($current+1), 'value' => '<i class="icon-chevron-right icon-white"></i>');
    	
    	return $pagination;
    }

    function action_index(){
    	if (Auth::isAuth()){
    			$pages 	 = $this->model->get_pages_count();
    			$data = $this->model->get_threads(0);
				$extars = $this->make_pagination($pages, 0);
				$post_reply = '/reply';
    			$this->view->generate('main_view.php', 'template_view.php', $data, $post_reply, $extars );
    	}else
    		$this->view->generate('login_view.php', 'template_view.php');
    }


    function action_page($page){
    	if (Auth::isAuth()){
    			$pages 	 = $this->model->get_pages_count();
    			$data = $this->model->get_threads($page);
    			$extars = $this->make_pagination($pages, $page);
    			$post_reply = '/reply';
    			$this->view->generate('main_view.php', 'template_view.php', $data, $post_reply, $extars );
    	}else
    		Route::ErrorPage404();
    }
}