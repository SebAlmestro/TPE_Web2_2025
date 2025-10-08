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
    function showBanda($id) {
        $banda = $this->model->getBanda($id);

        if (!$banda) {
            $this->view->showError("⚠️ No se encontró la banda con ID $id");
            return;
        }

        $this->view->showBanda($banda);
    }


    function showAgregarBanda() {
        $this->view->showAgregarBanda();
    }

    function addBanda() {
        if (!empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['genero']) && !empty($_POST['imagen'])) {
            $nombre = $_POST['nombre'];
            $pais = $_POST['pais'];
            $genero = $_POST['genero'];
            $imagen = $_POST['imagen'];

            $this->model->addBanda($nombre, $pais, $genero, $imagen);
            header("Location: " . BASE_URL . "bandas");
        } else {
            $this->view->showError("Todos los campos son obligatorios");
        }
    }
    function deleteBanda($id){
        
        $banda = $this->model->getBanda($id);
         if (!$id) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        $this->model->deleteBanda($id);

        // redirijo al home
        header('Location: ' . BASE_URL);


    }

}