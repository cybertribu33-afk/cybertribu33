<?php
session_start();
require_once "conexion.php";

$id_usuario  = $_SESSION['id_usuario']; // quien se apunta
$id_ausencia = $_POST['id_ausencia'];
$fecha       = $_POST['fecha'];
$hora        = $_POST['hora'];
$tarea       = $_POST['tarea'] ?? '';

// Comprobar si ya está cubierta
$check = $conexion->query("SELECT * FROM guardias_realizadas 
                           WHERE id_ausencia = $id_ausencia");

if ($check->num_rows > 0) {
    die("Esta guardia ya está cubierta.");
}

// Insertar la guardia apuntada
$sql = $conexion->prepare("INSERT INTO guardias_realizadas (id_ausencia, id_usuario, fecha, hora, tarea) VALUES (?, ?, ?, ?, ?)");
$sql->bind_param("iisss", $id_ausencia, $id_usuario, $fecha, $hora, $tarea);
$sql->execute();

// Ya NO cambiamos el estado de la ausencia
// $conexion->query("UPDATE ausencia SET estado = 'cubierta' WHERE id_ausencia = $id_ausencia");

header("Location: inicio.php");
exit();
?>

