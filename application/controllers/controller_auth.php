<?php
class Controller_Auth extends Controller{
    function __construct(){
        $this->model    = new Model_Auth();
        $this->view     = new View();
        $this->request  = new Request();
    }

    function action_index(){
        if (isset($this->request->post->email) && isset($this->request->post->password))
            $uid =$this->model->check_user($this->request->post->email, $this->request->post->password);
            if (isset($uid) && $uid) {
                Auth::setAuth($this->request->post->email, $uid);
                Route::IndexPage();
            } else {
                $data = '<center><div class="badge badge-important">Неправильный логин или пароль!</div></center><br/>';
                $this->view->generate('login_view.php', 'template_view.php', $data);
            }
    }

    function action_logout(){
        Auth::unsetAuth();
        Route::IndexPage();
    }


}
