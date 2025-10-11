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
}