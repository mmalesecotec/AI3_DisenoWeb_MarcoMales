<?php
/* Página principal */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Estudiantes</title>
</head>
<body>

    <h1>Sistema de Registro de Estudiantes</h1>

    <p>Bienvenido al sistema de gestión de estudiantes.</p>

    <h2>Opciones del sistema</h2>

    <ul>
        <li>Registrar estudiantes</li>
        <li><a href="listar_estudiantes.php">Consultar estudiantes</a></li>
        <li>Actualizar estudiantes</li>
        <li>Eliminar estudiantes</li>
    </ul>

    <hr>
    <h2>Registrar nuevo estudiante</h2>
    <!-- Formulario ingreso de datos -->
    <form action="guardar_estudiante.php" method="POST"> <!-- pasar los datos a este archivo -->

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
        <br><br>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <br><br>

        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" required>
        <br><br>

        <label for="semestre">Semestre:</label>
        <input type="number" id="semestre" name="semestre"
               min="1" max="10" required>
        <br><br>

        <button type="submit">Guardar estudiante</button>
    </form> <!-- Fin Formulario ingreso de datos -->


</body>
</html>