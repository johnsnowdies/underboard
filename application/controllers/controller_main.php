<?php
class Controller_Main extends Controller
{
    function __construct()
    {
        $this->model = new Model_Main();

        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_SESSION['user'])){
            if ($_SESSION['uid'] == $this->model->check_uid($_SESSION['user'])) {
                $data = $this->model->get_data();
                $this->view->generate('main_view.php', 'template_view.php', $data);
            }
        }else
            $this->view->generate('login_view.php', 'template_view.php');

    }

    function action_bad()
    {
        if (!isset($_SESSION['user'])) {

        } else self::action_index();

    }
}

?>