<?php
require_once './app/controllers/banda.controller.php';
require_once './app/controllers/concierto.controller.php';
require_once './app/controllers/auth.controller.php';

$bandaController = new BandaController();


// base_url para redirecciones y base tag
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// accion por defecto si no se envia ninguna
$action = 'bandas';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'bandas':
        $bandaController->showBandas();
        break;
    case 'banda':
        if (isset($params[1])) {
            $bandaController->showBanda($params[1]);
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
        if (isset($params[1])) {
            $bandaController->editarBanda($params[1]);
        } else {
            $this->view->showError("No se recibió el ID de la banda a editar.");
        }
        break;
    case 'eliminar':
        if (isset($params[1])) {
            $bandaController->deleteBanda($params[1]);
        } else {
            $this->view->showError("No se recibió el ID de la banda a editar.");
        }
        break;
    default:
        echo "404 Page Not Found";
        break;
}
