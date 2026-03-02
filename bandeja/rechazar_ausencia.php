<?php
require_once "../check_admin.php";
require_once "../conexion.php";

$id = $_GET['id'] ?? 0;
$accion = basename($_SERVER['PHP_SELF'], ".php") === "aprobar_ausencia" ? "aceptado" : "rechazado";

$sql = "UPDATE ausencia SET estado=? WHERE id_ausencia=?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $accion, $id);
$stmt->execute();

header("Location: admin_ausencias.php");
