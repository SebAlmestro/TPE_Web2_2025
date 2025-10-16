<?php
require_once './app/models/user.model.php';
require_once './app/views/user.view.php';
class UserController {
    private $view;
    private $model;

    public function __construct() {
        $this->view = new UserView();
        $this->model = new UserModel();
    }
    }