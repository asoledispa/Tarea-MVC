<?php
class Database {
    public static function conectar() {
        $host = "localhost";
        $user = "root";
        $password = "123456"; // CAMBIA ESTO si tienes contraseña
        $database = "tienda";
        $port = 3306;

        $conexion = new mysqli($host, $user, $password, $database, $port);
        
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}