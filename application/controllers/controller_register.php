<?php
class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['invite']))
            $uid = $this->model->createUser();
        // Регистрация и инвайты
            if ( $uid != false) {
                $_SESSION['user'] = $_POST['email'];
                $_SESSION['uid']  = $uid;
                header("Location: /");
            } else {
                $data = '<div class="alert alert-error">Произошла ошибка при регистрации! Возможно такой email уже используется, или вы используете просроченый код.</div>';
                $this->view->generate('register_view.php', 'template_view.php', $data);
            }
    }
}
