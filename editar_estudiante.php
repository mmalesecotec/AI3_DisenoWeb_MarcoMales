<?php
/* Formulario para editar un estudiante */
require_once __DIR__ . '/models/Estudiante.php';

/* Obtener el ID  */
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    exit("ID de estudiante no válido.");
}

/* Buscar datos */
$estudiante = new Estudiante();
$datos = $estudiante->obtenerPorId($id);

if (!$datos) {
    exit("Estudiante no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar estudiante</title>
</head>
<body>

    <h1>Editar estudiante</h1>

    <form action="actualizar_estudiante.php" method="POST">

        <input type="hidden" name="id"
               value="<?= (int)$datos['id'] ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"
               value="<?= htmlspecialchars($datos['nombre'], ENT_QUOTES, 'UTF-8') ?>"
               required>
        <br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido"
               value="<?= htmlspecialchars($datos['apellido'], ENT_QUOTES, 'UTF-8') ?>"
               required>
        <br><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo"
               value="<?= htmlspecialchars($datos['correo'], ENT_QUOTES, 'UTF-8') ?>"
               required>
        <br><br>

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera"
               value="<?= htmlspecialchars($datos['carrera'], ENT_QUOTES, 'UTF-8') ?>"
               required>
        <br><br>

        <label for="semestre">Semestre:</label>
        <input type="number" id="semestre" name="semestre"
               value="<?= (int)$datos['semestre'] ?>"
               min="1" max="10" required>
        <br><br>

        <button type="submit">Guardar cambios</button>

    </form>

    <p><a href="listar_estudiantes.php">Volver al listado</a></p>

</body>
</html>
