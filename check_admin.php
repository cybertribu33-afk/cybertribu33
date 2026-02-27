<?php
// Verificar que el usuario está autenticado y es administrador
session_start();

if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['rol'])) {
    header("Location: ../inicio.php");
    exit;
}

if ($_SESSION['rol'] !== 'admin' && $_SESSION['rol'] !== 'Administrador') {
    echo "Acceso denegado. Solo los administradores pueden acceder a esta página.";
    exit;
}
?>
