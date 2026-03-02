<?php
session_start();
require_once "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

// Recoge los datos del formulario
$dni = $_POST['dni'] ?? '';
$password = $_POST['contrasena'] ?? '';

// Consulta el usuario por DNI
$sql = "SELECT * FROM usuario WHERE dni = ?";
$stmt = $conexion->prepare($sql);

$stmt->bind_param("s", $dni);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

// Verifica contraseña
if ($usuario && password_verify($password, $usuario['contraseña'])) {
    $_SESSION['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['rol'] = $usuario['rol'];
    header("Location: ../inicio.php");
    exit;
} else {
    echo "DNI o contraseña incorrectos";
}



