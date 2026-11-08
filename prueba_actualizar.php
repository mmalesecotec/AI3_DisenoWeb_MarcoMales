<?php
require_once __DIR__ . '/models/Estudiante.php';

try {
    $estudiante = new Estudiante();

    $resultado = $estudiante->actualizar(
        1,
        "Juan Carlos",
        "Perez",
        "juan.prueba@example.com",
        "Arquitectura",
        4
    );

    if ($resultado) {
        echo "Estudiante actualizado correctamente.";
    } else {
        echo "No se pudo actualizar el estudiante.";
    }

} catch (Exception $error) {
    echo "Ocurrió un error al actualizar el estudiante.";
}
