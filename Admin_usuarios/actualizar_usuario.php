<?php
// Incluye el archivo de conexión a la base de datos
require_once "../conexion.php";

// Verifica que la petición sea por método POST
// Si no lo es, redirige a usuarios.php y termina el script
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: usuarios.php");
    exit;
}

// Recoge los datos enviados desde el formulario mediante POST
$nombre       = $_POST['nombre'];        // Nombre del usuario
$apellido     = $_POST['apellido'];      // Apellido del usuario
$dni_nuevo    = $_POST['dni'];            // Nuevo DNI (por si se modifica)
$dni_original = $_POST['dni_original'];   // DNI original para identificar al usuario
$correo       = $_POST['correo'];         // Correo electrónico
$rol          = $_POST['rol'];             // Rol del usuario
$familia      = $_POST['familia'];         // Familia a la que pertenece

// Consulta SQL para actualizar los datos del usuario
// Se usan marcadores (?) para evitar inyección SQL
$sql = "UPDATE usuario 
        SET nombre = ?, apellido = ?, dni = ?, correo = ?, rol = ?, familia = ?
        WHERE dni = ?";

// Prepara la consulta SQL
$stmt = $conexion->prepare($sql);

// Asocia los valores a los marcadores de la consulta
// "sssssss" indica que todos los parámetros son strings
$stmt->bind_param(
    "sssssss",
    $nombre,
    $apellido,
    $dni_nuevo,
    $correo,
    $rol,
    $familia,
    $dni_original
);

// Ejecuta la consulta preparada
$stmt->execute();

// Redirige de nuevo a la página de usuarios tras la actualización
header("Location: usuarios.php");
exit;
