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
    function showIniciarSesion(){
        $this->view->showIniciarSesion();
    }

    public function IniciarSesion() {
        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['usuario']) && !empty($_POST['contraseña'])){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $usuarioEncontrado = $this->model->listarPorUsuario($usuario);

            // Si el usuario no se encuentra, devolvemos una alerta.
            if(!$usuarioEncontrado) {
                $this->view->showError("Este usuario no existe");
                die();
            }

            $contraseniaEncontrada = $usuarioEncontrado['contraseña'];

            if(password_verify($contraseña, $contraseniaEncontrada)){ // Comparamos la contraseña hasheada guardada y el hash de la nueva.
                $_SESSION['usuario'] = $usuario;
                header("Location: " . BASE_URL . "bandas");
            } else {
                $this->view->showError("Contraseña Incorrecta");
                die();
            }
        }
    }

    public function cerrarSesion(){
        session_destroy(); // Cerramos la sesion y devolvemos al inicio.
        header("Location: " . BASE_URL . "bandas");
    }
}