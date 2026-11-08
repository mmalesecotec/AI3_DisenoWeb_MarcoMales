# AI3_DisenoWeb_MarcoMales
Sistema web de registro de estudiantes en PHP, MySQL y PDO
## Descripción del Sistema WEB
Sistema web desarrollada con PHP, MySQL, HTML5 y CSS3.
El sistema permite:
- Registrar.
- Consultar.
- Actualizar información.
- Eliminar.
- Validar los datos ingresados.
- Visualizar los registros en una tabla adaptable a diferentes pantallas.

## Tecnologías utilizadas

- PHP
- MySQL
- PDO
- HTML5
- CSS3
- XAMPP
- Git y GitHub

## Requisitos para ejecutar el proyecto

- Tener instalado XAMPP con Apache, MySQL y PHP.
- Contar con un navegador web.
- Tener acceso a phpMyAdmin.

## Instalación y ejecución local

1. Descargar o clonar este repositorio.
2. Copiar la carpeta `AI3_DisenoWeb_MarcoMales` dentro de `xampp/htdocs`.
3. Abrir el panel de control de XAMPP.
4. Iniciar los servicios Apache y MySQL.
5. Ingresar a `http://localhost/phpmyadmin`.
6. Crear una base de datos llamada `db_sistema_web`.
7. Importar el archivo `db_sistema_web.sql` desde phpMyAdmin.
8. Dentro de la carpeta `config`, copiar el archivo `database.example.php` y renombrar la copia como `database.php`.
9. Revisar en `database.php` los valores de servidor, nombre de base de datos, usuario y contraseña, según la configuración local de MySQL.
10. Abrir en el navegador:

   `http://localhost/AI3_DisenoWeb_MarcoMales/`

## Estructura del proyecto

- `class/`: conexión mediante PDO.
- `config/`: configuración-conexión.
- `models/`: clase Estudiante y operaciones CRUD.
- `css/`: estilos .
- `js/`: archivos JavaScript.
- `index.php`: página principal y formulario de registro.
- `listar_estudiantes.php`: listado de estudiantes.
- `editar_estudiante.php`: formulario de edición.
- `actualizar_estudiante.php`: procesamiento de actualizaciones.
- `eliminar_estudiante.php`: procesamiento de eliminaciones.
- `guardar_estudiante.php`: procesamiento de nuevos registros.
- `db_sistema_web.sql`: estructura de la base de datos.

## Seguridad implementada

- Conexión a MySQL mediante PHP Data Objects.
- Instruciones para ejecutar operaciones con la base de datos.
- Validación de formularios en el navegador y en PHP.
- Uso de `htmlspecialchars()` para proteger las salidas HTML.
- Manejo de errores de conexión.
- Exclusión de archivos de configuración privada mediante `.gitignore`.

## Control de versiones

El desarrollo se realiza mediante Git y GitHub, registrando commits significativos para documentar los 
avances del proyecto.

## Autor

Marco Males

Proyecto académico de Programación de Sistemas Web.
