<?php
class UserView{
    public function showIniciarSesion(){
        include_once './templates/users/form_login.phtml';
    }
    public function showError($error)
    {
        include_once './templates/error.phtml';
    }
}