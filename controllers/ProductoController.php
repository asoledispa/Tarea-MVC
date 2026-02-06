<?php
require_once '../models/Producto.php';

class ProductoController {
    private $modelo;

    public function __construct() {
        $this->modelo = new Producto();
    }

    public function index() {
        $productos = $this->modelo->listar();
        require_once '../views/index.php';
    }

    public function create() {
        require_once '../views/create.php';
    }

    public function store() {
        $errores = $this->validar($_POST);
        if (empty($errores)) {
            $this->modelo->guardar($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock']);
            header("Location: index.php?controller=producto&action=index");
        } else {
            require_once '../views/create.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $p = $this->modelo->obtenerPorId($id);
        require_once '../views/edit.php';
    }

    public function update() {
        $id = $_POST['id'];
        $errores = $this->validar($_POST);
        if (empty($errores)) {
            $this->modelo->actualizar($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock']);
            header("Location: index.php?controller=producto&action=index");
        } else {
            $p = (object)$_POST;
            require_once '../views/edit.php';
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->modelo->eliminar($_GET['id']);
        }
        header("Location: index.php?controller=producto&action=index");
    }

    private function validar($datos) {
        $errores = [];
        if (empty($datos['nombre']) || strlen($datos['nombre']) < 3) $errores[] = "Nombre obligatorio (mín. 3 caracteres).";
        if (!isset($datos['precio']) || $datos['precio'] <= 0) $errores[] = "Precio obligatorio y mayor a 0.";
        if (!isset($datos['stock']) || $datos['stock'] < 0 || $datos['stock'] == "") $errores[] = "Stock debe ser un número no negativo.";
        return $errores;
    }
}