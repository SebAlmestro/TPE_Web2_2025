<?php
require_once './app/models/concierto.model.php';
require_once './app/views/concierto.view.php';
class ConciertoController{
    private $model;

    private $view;

    function __construct()
    {
        $this->model = new ConciertoModel();
        $this->view = new ConciertoView();
    }
    private function verificarSesion() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "bandas");
            die();
        }
    }
    function showConciertos()
    {
        // pido las tareas al modelo
        $conciertos = $this->model->getConciertos();

        // se las mando a la vista
        $this->view->showConciertos($conciertos);
    }
    function showConcierto($id)
    {
        $concierto = $this->model->getConcierto($id);

        if (!$concierto) {
            $this->view->showError("No se encontró el concierto con ID $id");
            return;
        }

        $this->view->showConcierto($concierto);
    }
    function showAgregarConcierto()
    {
        $this->verificarSesion();
        $this->view->showAgregarConcierto();
    }
    function addConcierto(){
        $this->verificarSesion();
        if (!empty($_POST['fecha']) && !empty($_POST['horario']) && !empty($_POST['lugar'])
        && !empty($_POST['ciudad'] && !empty($_POST['id_banda']))){
            $fecha = $_POST['fecha'];
            $horario = $_POST['horario'];
            $lugar = $_POST['lugar'];
            $ciudad = $_POST['ciudad'];
            $id_banda = $_POST['id_banda'];

            $this->model->addConcierto($fecha, $horario, $lugar, $ciudad, $id_banda);
            header("Location: " . BASE_URL . "conciertos");
        } else {
            $this->view->showError("Todos los campos son obligatorios");
        }
    }
    function deleteConcierto($id)
    {
        $this->verificarSesion();

        $concierto = $this->model->getConcierto($id);
        if (!$concierto) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        $this->model->deleteConcierto($id);

        header('Location: ' . BASE_URL . "conciertos");
    }

    function showEditarConcierto($id)
    {
        $this->verificarSesion();
        $concierto = $this->model->getConcierto($id);

        if (!$concierto) {
            $this->view->showError("No se encontró la banda con ID $id");
            return;
        }

        $this->view->showEditarConcierto($concierto);
    }
    function editarConcierto($id)
    {
        $this->verificarSesion();
        $conciertoActual = $this->model->getConcierto($id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $fecha = !empty($_POST['fecha']) ? $_POST['fecha'] : $conciertoActual->Fecha;
            $horario   = !empty($_POST['horario']) ? $_POST['horario'] : $conciertoActual->Horario;
            $lugar = !empty($_POST['lugar']) ? $_POST['lugar'] : $conciertoActual->Lugar;
            $ciudad = !empty($_POST['ciudad']) ? $_POST['ciudad'] : $conciertoActual->Ciudad;
            $id_banda = !empty($_POST['id_banda']) ? $_POST['id_banda'] : $conciertoActual->id_banda;
            $this->model->editarConcierto($id, $fecha, $horario, $lugar, $ciudad, $id_banda);
            header("Location: " . BASE_URL . "conciertos");
        } else {
            $this->view->showError("Error al editar concierto");
        }
        //forma de hacer el if de forma mas reducida,
        //si lo que viene por post en nombre no esta vacio, entonces
        //guardo nombre de la banda que ya estaba accediendo al modelo getbanda;
    }
}