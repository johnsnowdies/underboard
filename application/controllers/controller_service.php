<?php
class Controller_Service extends Controller {
	function __construct(){
		$this->model = new Model_Service();
	}

    function action_index(){
        if(isset($_POST['method'])){
        	if($_POST['method'] == 'set')
        		$this->model->dislike($_POST['user'],$_POST['thread']);
        	if($_POST['method'] == 'revert')
        		$this->model->revert_dislike($_POST['user'], $_POST['thread']);
        	if($_POST['method'] == 'get'){
        		$result = $this->model->get_state($_POST['user'], $_POST['thread']);
        		$ret = '{"results":"no"}';
        		while ($row = $result->fetch())
        			if (isset($row['id']))
        				$ret = '{"results":"yes"}';
        		echo $ret;
        	}
        	else
	        	echo '{"results":"true"}';
        }
        else 
        	echo '{"results":"false"}';
    }
}
