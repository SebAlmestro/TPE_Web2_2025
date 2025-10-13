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
            $this->view->showError("⚠️ No se encontró el concierto con ID $id");
            return;
        }

        $this->view->showConcierto($concierto);
    }
    function showAgregarConcierto()
    {
        $this->view->showAgregarConcierto();
    }
    function addConcierto(){
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

        $concierto = $this->model->getConcierto($id);
        if (!$concierto) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        $this->model->deleteConcierto($id);

        header('Location: ' . BASE_URL . "conciertos");
    }
}