<?php
// Datos de conexión
$host = 'localhost'; // o el IP de tu servidor de base de datos
$dbname = 'gestion_horarios';    // Nombre de tu base de datos
$username = 'root';  // Nombre de usuario de la base de datos
$password = '';      // Contraseña de la base de datos (si la hay)

// Crear la conexión usando MySQLi
$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar si hay un error en la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}