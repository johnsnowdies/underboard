<?php
class Controller{
    public $model;
    public $view;
    public $request;

    function __construct(){
        $this->view = new View();
    }

    function action_index(){}
}

