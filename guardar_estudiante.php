<?php
/* Guardar los datos enviados desde el formulario */

require_once __DIR__ . '/models/Estudiante.php';

   /* Verificar que los datos lleguen mediante POST */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
/* Recibir los datos del formulario */
    $nombre = trim($_POST["nombre"] ?? "");
    $apellido = trim($_POST["apellido"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $carrera = trim($_POST["carrera"] ?? "");
    $semestre = filter_var(
        $_POST["semestre"] ?? null,
        FILTER_VALIDATE_INT
    );
/* Validar los datos */
    if (
        $nombre === "" ||
        $apellido === "" ||
        !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
        $carrera === "" ||
        $semestre === false ||
        $semestre < 1 ||
        $semestre > 10
    ) {
        exit("Datos incorrectos. Verifica el formulario.");
    }

    try {
    /* Crear objeto estudiante */
        $estudiante = new Estudiante();

    /* Registrar en la base de datos */
        if ($estudiante->registrar(
            $nombre,
            $apellido,
            $correo,
            $carrera,
            $semestre
        )) {
            echo "Estudiante registrado correctamente.";
        } else {
            echo "No se pudo registrar el estudiante.";
        }

    } catch (Exception $error) {
        error_log($error->getMessage());
        echo "Error al guardar el estudiante.";
    }

} else {
    echo "Sin Acceso....";
}