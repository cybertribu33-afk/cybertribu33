<?php
require_once "../conexion.php";

if (!isset($_GET['dni'])) {
    header("Location: usuarios.php");
    exit;
}

$dni = $_GET['dni'];

$sql = "DELETE FROM usuario WHERE dni = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $dni);

$stmt->execute();

header("Location: usuarios.php");
exit;
