<?php
class Controller_Auth extends Controller
{
	 function __construct()
    {
		  $this->model = new Model_Auth();    
          $this->view = new View();	
    }

    function action_index()
    {	
    	if(isset($_POST['email']) && isset($_POST['password']))
    	if ($this->model->check_user($_POST['email'],$_POST['password'])){  
    		$_SESSION['user'] = 'yes';
            
	        header("Location: /");
        }
        else
            {
                $data = '<div class="alert alert-error">Неправильный логин или пароль!</div>';
                $this->view->generate('login_view.php', 'template_view.php',$data);
            }
    }

    function action_logout()
    {
    	unset( $_SESSION['user']);
    	header("Location: /");
    }

    
}
?>