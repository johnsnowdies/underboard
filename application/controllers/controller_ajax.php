<?php
class Controller_Ajax extends Controller {

    function action_index(){
        if(isset($_POST['uid'])){
            echo '{"results":"ok"}';
        }
    }
}

?>