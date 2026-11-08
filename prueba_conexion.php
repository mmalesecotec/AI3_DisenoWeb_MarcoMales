<?php
/* prueba de conexion */
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/class/conexion.php';
try {
    $conexion = Conexion::conectar();

    echo "Conexión exitosa: a la base de datos db_sistema_web";

} catch (Exception $error) {
    echo "No se pudo establecer la conexión.";
}