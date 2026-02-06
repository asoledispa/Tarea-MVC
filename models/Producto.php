<?php
require_once '../config/db.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function listar() {
        return $this->db->query("SELECT * FROM productos ORDER BY id DESC");
    }

    public function guardar($nombre, $descripcion, $precio, $stock) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', $precio, $stock)";
        return $this->db->query($sql);
    }

    public function obtenerPorId($id) {
        return $this->db->query("SELECT * FROM productos WHERE id = $id")->fetch_object();
    }

    public function actualizar($id, $nombre, $descripcion, $precio, $stock) {
        $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio=$precio, stock=$stock WHERE id=$id";
        return $this->db->query($sql);
    }

    public function eliminar($id) {
        return $this->db->query("DELETE FROM productos WHERE id = $id");
    }
}