<?php
require_once __DIR__ . '/models/Estudiante.php';

try {
    $estudiante = new Estudiante();

    $lista = $estudiante->listar();

    echo "<h2>Listado de estudiantes</h2>";

    foreach ($lista as $dato) {
        echo "ID: " . htmlspecialchars((string)$dato['id']) . "<br>";
        echo "Nombre: " . htmlspecialchars($dato['nombre']) . "<br>";
        echo "Apellido: " . htmlspecialchars($dato['apellido']) . "<br>";
        echo "Correo: " . htmlspecialchars($dato['correo']) . "<br>";
        echo "Carrera: " . htmlspecialchars($dato['carrera']) . "<br>";
        echo "Semestre: " . htmlspecialchars((string)$dato['semestre']) . "<br>";
        echo "<hr>";
    }

} catch (Exception $error) {
    echo "Error al consultar los estudiantes.";
}
