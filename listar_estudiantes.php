<!-- Código PHP -->
<?php 
/* Listar estudiantes registrados */

require_once __DIR__ . '/models/Estudiante.php';

$estudiante = new Estudiante();
$listaEstudiantes = $estudiante->listar(); /* método listar() de la clase Estudiante.php */
?>
<!-- Fin Código PHP -->
<!-- Código HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de estudiantes</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <h1>Listado de estudiantes registrados</h1>
    <div class="tabla-contenedor">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaEstudiantes as $fila): ?>
                <tr> <!-- Seguridad XSS -->
                    <td><?= htmlspecialchars((string)$fila['id'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($fila['nombre'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($fila['apellido'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($fila['correo'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($fila['carrera'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$fila['semestre'], ENT_QUOTES, 'UTF-8') ?></td>
                    
                    <td> <!-- Botonera Editar, Eliminar -->
                        <a href="editar_estudiante.php?id=<?= urlencode((string)$fila['id']) ?>">
                        Editar
                        </a>

                     |

                    <form action="eliminar_estudiante.php"
                    method="POST"
                    style="display:inline;"
                    onsubmit="return confirm('¿Está seguro de eliminar este estudiante?');">

                    <input type="hidden" name="id"
                    value="<?= (int)$fila['id'] ?>">

                    <button type="submit">Eliminar</button>
                    </form>
                    </td> <!-- Fin Botonera Editar, Eliminar -->

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

</body>
</html>
<!-- Fin Código HTML -->
