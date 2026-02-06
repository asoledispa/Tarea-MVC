<?php
require_once '../controllers/ProductoController.php';

$controller = $_GET['controller'] ?? 'producto';
$action = $_GET['action'] ?? 'index';

if ($controller == 'producto') {
    $objController = new ProductoController();
    if (method_exists($objController, $action)) {
        $objController->$action();
    } else {
        echo "Acción no encontrada";
    }
}