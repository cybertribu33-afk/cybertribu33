<?php
session_start();
require_once "../conexion.php"; // Ajusta la ruta

if (!isset($_SESSION['id_usuario_cambio'])) {
    die("Acceso no permitido");
}

// Recoger datos del formulario
$contrasena = $_POST['contrasena'] ?? '';
$confirmar = $_POST['confirmar'] ?? '';

if ($contrasena !== $confirmar) {
    die("Las contraseñas no coinciden.");
}

// Hashear la nueva contraseña
$hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Actualizar contraseña usando MySQLi
$sql = "UPDATE usuario SET contraseña = ? WHERE id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $hash, $_SESSION['id_usuario_cambio']);

if ($stmt->execute()) {
    // Limpiar sesión temporal
    unset($_SESSION['id_usuario_cambio']);
    echo "Contraseña cambiada correctamente. <a href='../login.html'>Inicia sesión</a>";
} else {
    echo "Error al actualizar la contraseña: " . $conexion->error;
}

