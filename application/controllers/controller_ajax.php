<?php
class Controller_Ajax extends Controller {


    function action_index(){
        if(isset($_POST['method'])){
        	if($_POST['method'] == 'getState')

	            echo '{"results":"true"}';
        }


    }
}

?>