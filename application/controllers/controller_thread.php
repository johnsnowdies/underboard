<?php
class Controller_Thread extends Controller
{
    function __construct()
    {
        $this->model = new Model_Thread();
        $this->view = new View();
    }

    function action_index()
    {

    }

    function action_show($id)
    {
        if (isset($_SESSION['user'])) {
            $data = $this->model->get_thread($id);
            $this->view->generate('thread_view.php', 'template_view.php', $data, $id);
        } else
            header('Location:/');
    }
}

?>