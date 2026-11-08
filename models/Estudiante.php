<?php
/* Gestión de estudiantes */

require_once __DIR__ . '/../class/conexion.php';/* Agrega nuestra clase de conexión */

class Estudiante {/* define el modelo que gestionara los estudiantes */

    private $conexion;/* alamacena la conexión */

    public function __construct() { /* establece automáticamente la conexión */
        $this->conexion = Conexion::conectar();
    }

    /* Registrar un estudiante */
    public function registrar($nombre, $apellido, $correo, $carrera, $semestre) {
        /* agrega una fila a la tabla */
        $sql = "INSERT INTO estudiantes    
                (nombre, apellido, correo, carrera, semestre)
                VALUES (:nombre, :apellido, :correo, :carrera, :semestre)";

        $consulta = $this->conexion->prepare($sql);
        /* envía los valores del estudiante */
        return $consulta->execute([   
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':carrera' => $carrera,
            ':semestre' => $semestre
        ]);
    } /* fin Registrar un estudiante */
    
    /* Consultar todos los estudiantes */
    public function listar() {

        $sql = "SELECT * FROM estudiantes ORDER BY id DESC"; /* Consultar todos los registros */

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll();
    }  /* Fin Consultar todos los estudiantes */

    /* Actualizar datos del estudiante */
    public function actualizar($id, $nombre, $apellido, $correo, $carrera, $semestre) {
        /* indica que modificaremos una fila */
        $sql = "UPDATE estudiantes
                SET nombre = :nombre,
                    apellido = :apellido,
                    correo = :correo,
                    carrera = :carrera,
                    semestre = :semestre
                WHERE id = :id";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([
            ':id' => $id,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':carrera' => $carrera,
            ':semestre' => $semestre
        ]);
    }    /* Fin actualizar datos del estudiante */
    
    /* Eliminar estudiante */
    public function eliminar($id) {

    /* Elimina el registro (ID) */
    $sql = "DELETE FROM estudiantes WHERE id = :id";
    /* Prepara la consulta */
    $consulta = $this->conexion->prepare($sql);
    /* Ejecuta la eliminación */
    return $consulta->execute([
        ':id' => $id
    ]);
    } 
    /* Fin eliminar estudiante */

} /* fin de la clase */
