<?php
require_once './app/controllers/banda.controller.php';
require_once './app/controllers/concierto.controller.php';
require_once './app/controllers/auth.controller.php';

$bandaController = new BandaController();
$conciertoController = new ConciertoController();
$view = new BandaView();


// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// accion por defecto si no se envia ninguna
$action = 'bandas';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);
if($params[0] === "bandas"){
    if (!isset($params[1])) {
        $bandaController->showBandas();
    }
switch ($params[1]) {
    case 'banda':
        if (isset($params[2])) {
            $bandaController->showBanda($params[2]);
        } else {
            $this->view->showError("ID de banda no especificado.");
        }
        break;
    case 'crear':
        $bandaController->addBanda();
        break;
    case 'agregar':
        $bandaController->showAgregarBanda();
        break;
    case 'editar':
        if (isset($params[2])) {
            $bandaController->showEditarBanda($params[2]);
        } else {
            $this->view->showError("Id de banda no especificado");
        }
        break;

    case 'actualizar':
        if (isset($params[2])) {
            $bandaController->editarBanda($params[2]);
        } else if (isset($_POST['id'])) {
            $bandaController->editarBanda($_POST['id']);
        } else {
            echo "No se recibió el ID de la banda para actualizar.";
        }
        break;
    case 'eliminar':
        if (isset($params[2])) {
            $bandaController->deleteBanda($params[2]);
        } else {
            echo "Id de banda a eliminar no especificado";
        }
        break;
    default:
        echo "404 Page Not Found";
        break;
}
}
if ($params[0] === "conciertos") {

    if (!isset($params[1])) {
        $conciertoController->showConciertos();
        exit;
    }

    switch ($params[1]) {
        case 'concierto':
            if (isset($params[2])) {
                $conciertoController->showConcierto($params[2]);
            } else {
                $this->view->showError("ID de concierto no especificado.");
            }
            break;
    
    }
}
