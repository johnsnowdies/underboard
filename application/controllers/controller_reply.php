<?php
class Controller_Reply extends Controller
{
    function __construct()
    {
        $this->model = new Model_Reply();
        $this->view = new View();
    }

    function action_index()
    {
        if (isset($_POST['author'])) {
            if ($_POST['author'] != "" && $_POST['body'] != "") {
                if ($_POST['title'] == "") $title = "комментарий:";
                    else
                        $title = $_POST['title'];

                if ($_FILES['inputImage']['size'] > 0){
                    $fileName = $_FILES['inputImage']['name'];
                    $tmpName  = $_FILES['inputImage']['tmp_name'];
                    $fileSize = $_FILES['inputImage']['size'];
                    $fileType = $_FILES['inputImage']['type'];

                    $fp      = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
                    fclose($fp);    
                }
                
                if ($_FILES['inputImage']['size'] > 0)
                    $this->model->insert_Reply($title, $_POST['body'], $_POST['author'], $_POST['parent'], $content);
                else
                    $this->model->insert_Reply($title, $_POST['body'], $_POST['author'], $_POST['parent']);


                if ($_POST['parent'] == 0) header('Location: /');
                else
                    header('Location: /thread/show/' . $_POST['parent']);

            } else
                header('Location: /404');
        }
    }

}