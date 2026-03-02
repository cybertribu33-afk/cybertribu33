<?php
session_start();
require_once "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

// Recoger datos del formulario
$dni = $_POST['dni'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';

// Consulta con MySQLi
$sql = "SELECT * FROM usuario WHERE dni = ? AND nombre = ? AND correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $dni, $nombre, $correo);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($usuario) {
    // Guardamos el id del usuario en sesión
    $_SESSION['id_usuario_cambio'] = $usuario['id_usuario'];
    header("Location: nueva_contrasena.php");
    exit;
} else {
    echo "Datos incorrectos. Verifica tu DNI, nombre y correo.";
}
