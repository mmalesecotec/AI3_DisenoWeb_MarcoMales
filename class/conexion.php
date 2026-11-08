
<?php
/* Clase - Conexion PHP con MySQL mediante PDO */

require_once __DIR__ . '/../config/database.php'; /* importar configuración */
class Conexion {

    public static function conectar() {
        try { /* manejo de errores */
            $dsn = "mysql:host=" . DB_HOST .
                   ";dbname=" . DB_NAME .
                   ";charset=" . DB_CHARSET;

            $conexion = new PDO($dsn, DB_USER, DB_PASS);

            $conexion->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $conexion->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
            return $conexion;

        } catch (PDOException $error) {
            error_log("Error de conexión: " . $error->getMessage());
            throw new RuntimeException(
                "No se pudo conectar con la base de datos."
            );
        }
    }
}
