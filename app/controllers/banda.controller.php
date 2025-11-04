<?php
require_once './app/models/banda.model.php';
require_once './app/views/banda.view.php';

class BandaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new BandaModel();
        $this->view = new BandaView();
    }

    private function verificarSesion() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "bandas");
            die();
        }
    }

    function showBandas()
    {
        // pido las tareas al modelo
        $bandas = $this->model->getBandas();

        // se las mando a la vista
        $this->view->showBandas($bandas);
    }
    function showBanda($id)
    {
        $banda = $this->model->getBanda($id);

        if (!$banda) {
            $this->view->showError("No se encontró la banda con ID $id");
            return;
        }

        $this->view->showBanda($banda);
    }


    function showAgregarBanda()
    {
        $this->verificarSesion();
        $this->view->showAgregarBanda();
    }
    

    function addBanda()
    {
        $this->verificarSesion();
        if (
            !empty($_POST['nombre']) && !empty($_POST['pais']) && !empty($_POST['genero'])
            && !empty($_POST['imagen'])
        ) {
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
    function deleteBanda($id)
    {
        $this->verificarSesion();

        $banda = $this->model->getBanda($id);
        if (!$banda) {
            return $this->view->showError("No existe la tarea con el id=$id");
        }

        try {
            $this->model->deleteBanda($id);
            header('Location: ' . BASE_URL);
            exit;
        } catch (PDOException $e) {
            // Si el error es por restricción de clave foránea
            if ($e->getCode() == '23000') {
                // Mostramos tu vista de error amigable
                return $this->view->showError("No se puede eliminar esta banda porque tiene conciertos asignados.");
            } else {
                // Si es otro error de base de datos, lo mostramos igual pero controlado
                return $this->view->showError("Error al eliminar la banda: " . $e->getMessage());
            }
        }
    }

    function showEditarBanda($id)
    {
        $this->verificarSesion();
        $banda = $this->model->getBanda($id);

        if (!$banda) {
            $this->view->showError("No se encontró la banda con ID $id");
            return;
        }

        $this->view->showEditarBanda($banda);
    }
    function editarBanda($id)
    {
        $this->verificarSesion();
        $bandaActual = $this->model->getBanda($id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : $bandaActual->Nombre;
            $pais   = !empty($_POST['pais']) ? $_POST['pais'] : $bandaActual->Pais_origen;
            $genero = !empty($_POST['genero']) ? $_POST['genero'] : $bandaActual->Genero;
            $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : $bandaActual->Imagen;
            $this->model->editarBanda($id, $nombre, $pais, $genero, $imagen);
            header("Location: " . BASE_URL . "bandas");
        } else {
            $this->view->showError("Error al editar la banda");
        }
        //forma de hacer el if de forma mas reducida,
        //si lo que viene por post en nombre no esta vacio, entonces
        //guardo nombre de la banda que ya estaba accediendo al modelo getbanda;
    }
}
