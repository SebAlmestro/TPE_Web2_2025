<?php
require_once './app/models/banda.model.php';
require_once './app/views/banda.view.php';

class BandaController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new BandaModel();
        $this->view = new BandaView();
    }
    
    function showBandas() {
        // pido las tareas al modelo
        $bandas = $this->model->getBandas();

        // se las mando a la vista
        $this->view->showBandas($bandas);
    }

}