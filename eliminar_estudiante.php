<?php
/* Eliminar registro de la base de datos */
require_once __DIR__ . '/models/Estudiante.php';

/* Aceptar únicamente solicitudes POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Método no permitido.");
}

/* Obtener y validar el ID */
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit("ID de estudiante no válido.");
}

try {
    /* Crear objeto de la clase Estudiante */
    $estudiante = new Estudiante();

    /* Comprobar que el estudiante exista */
    if (!$estudiante->obtenerPorId($id)) {
        exit("El estudiante no existe.");
    }

    /* Ejecutar el método eliminar */
    $resultado = $estudiante->eliminar($id);

    if ($resultado) {
        /* Regresar al listado */
        header("Location: listar_estudiantes.php");
        exit;
    }

    echo "No se pudo eliminar el estudiante.";

} catch (Throwable $error) {
    error_log("Error al eliminar estudiante: " . $error->getMessage());
    http_response_code(500);
    echo "Ocurrió un error al eliminar el estudiante.";
}
