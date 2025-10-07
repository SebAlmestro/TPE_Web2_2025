<?php
require_once './app/controllers/banda.controller.php';
require_once './app/controllers/concierto.controller.php';
require_once './app/controllers/auth.controller.php';


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
        $controller = new BandaController();
        $controller->showBandas();
        break;
    case 'banda':
        $controller = new BandaController();
        $id = $params[1] ?? null;
        if ($id) {
            $controller->showBanda($id);
        } else {
            echo "ID de banda no especificado";
        }
        //revisar y mejorar!!!!!!
        break;
    case 'crear':
        $controller = new BandaController();
        $controller->addBanda();
        break;
    case 'agregar':
        $controller = new BandaController();
        $controller->showAgregarBanda();
        break;
    case 'eliminar':
        $controller = new BandaController();
        $id = $params[1] ?? null;
        if ($id) {
            $controller->deleteBanda($id);
        } else {
            echo "No se recibió el ID de la banda a eliminar.";
        }
        break;
    default:
        echo "404 Page Not Found";
        break;
}
