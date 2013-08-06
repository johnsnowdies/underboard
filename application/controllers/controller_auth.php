<?php
class Controller_Auth extends Controller
{
    function __construct()
    {
        $this->model    = new Model_Auth();
        $this->view     = new View();
        $this->request  = new Request();
    }

    function action_index()
    {
        if (!empty($this->request->post->email) && !empty($this->request->post->password))
            $uid =$this->model->check_user($this->request->post->email, $this->request->post->password);
            if ( $uid != false) {
                $_SESSION['user'] = $this->request->post->email;
                $_SESSION['uid']  = $uid;
                header("Location: /");
            } else {
                $data = '<div class="alert alert-error">Неправильный логин или пароль!</div>';
                $this->view->generate('login_view.php', 'template_view.php', $data);
            }
    }

    function action_logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['uid']);
        header("Location: /");
    }


}
