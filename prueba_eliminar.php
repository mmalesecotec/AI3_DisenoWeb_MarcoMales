<?php
/* Prueba para eliminar un estudiante */
require_once __DIR__ . '/models/Estudiante.php';
/* Crear objeto de la clase Estudiante */
$estudiante = new Estudiante();
/* ID del estudiante que se eliminará */
$id = 2;
/* Ejecutar la eliminación */
if ($estudiante->eliminar($id)) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar el estudiante.";
}