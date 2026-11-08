<?php
/* Ejecutar actualización */
require_once __DIR__ . '/models/Estudiante.php';

/* Sólo instrucciones POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Método no permitido.");
}
/* Recibir y validar los datos */
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$carrera = trim($_POST['carrera'] ?? '');
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_VALIDATE_INT);
/* Comprobar que los datos sean válidos */
if (
    !$id || $id < 1 ||
    $nombre === '' ||
    $apellido === '' ||
    !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
    $carrera === '' ||
    $semestre === false ||
    $semestre === null ||
    $semestre < 1 ||
    $semestre > 10
) {
    exit("Datos incorrectos. Verifica el formulario.");
}
/* Utilizar el método actualizar de la clase Estudiante */
try {
    $estudiante = new Estudiante();

    $resultado = $estudiante->actualizar(
        $id,
        $nombre,
        $apellido,
        $correo,
        $carrera,
        $semestre
    );

    if ($resultado) {
        header("Location: listar_estudiantes.php");
        exit;
    }

    echo "No se pudo actualizar el estudiante.";

} catch (Throwable $error) {
    error_log("Error al actualizar estudiante: " . $error->getMessage());
    http_response_code(500);
    echo "Ocurrió un error al actualizar el estudiante.";
}
