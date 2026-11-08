
<?php
require_once __DIR__ . '/models/Estudiante.php';

try {
    $estudiante = new Estudiante();

    $resultado = $estudiante->registrar(
        "Juan",
        "Perez",
        "juan.prueba@example.com",
        "Arquitectura",
        3
    );

    if ($resultado) {
        echo "Estudiante registrado correctamente.";
    } else {
        echo "No se pudo registrar el estudiante.";
    }

} catch (Exception $error) {
    echo "Ocurrió un error al registrar el estudiante.";
}
