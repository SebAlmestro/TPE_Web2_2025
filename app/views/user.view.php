<?php
class UserView{
    public function showIniciarSesion(){
        include_once './templates/users/form_login.phtml';
    }
    public function showError($error)
    {
        echo "<h1>$error</h1>";
    }
}