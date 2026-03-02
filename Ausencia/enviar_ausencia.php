<?php
session_start();
require_once "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso no permitido");
}

$id_usuario = $_POST['id_usuario'];
$fecha      = $_POST['fecha'];
$motivo     = $_POST['motivo'];
$aula       = $_POST['aula']; 
$horas_array = $_POST['horas'] ?? [];
$horas      = !empty($horas_array) ? implode(', ', $horas_array) : null;

$justificante = null;
$tarea = null;

// 📁 Crear carpeta uploads si no existe
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

// 📎 Subir justificante PDF
if (!empty($_FILES['justificante']['name']) && $_FILES['justificante']['error'] === 0) {
    $nombreArchivo = uniqid() . "_justificante.pdf";
    $destino = "uploads/" . $nombreArchivo;
    move_uploaded_file($_FILES['justificante']['tmp_name'], $destino);
    $justificante = $destino;
}

// 📎 Subir tarea PDF
if (!empty($_FILES['tarea']['name']) && $_FILES['tarea']['error'] === 0) {
    $nombreArchivo2 = uniqid() . "_tarea.pdf";
    $destino2 = "uploads/" . $nombreArchivo2;
    move_uploaded_file($_FILES['tarea']['tmp_name'], $destino2);
    $tarea = $destino2;
}

// 🧠 Insertar ausencia(s) (queda en pendiente)
$sql = "INSERT INTO ausencia 
(motivo, aula, tipo, justificante, tarea, id_usuario, id_horario, estado, fecha, horas)
VALUES (?, ?, 'Ausencia', ?, ?, ?, NULL, 'pendiente', ?, ?)";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error en preparación: " . $conexion->error);
}

$all_ok = true;

if (!empty($horas_array)) {
    // Insertar una fila por cada hora seleccionada
    foreach ($horas_array as $hora_item) {
        $hora_param = $hora_item;
        $stmt->bind_param(
            "ssssiss",
            $motivo,
            $aula,
            $justificante,
            $tarea,
            $id_usuario,
            $fecha,
            $hora_param
        );

        if (!$stmt->execute()) {
            $all_ok = false;
            break;
        }
    }
} else {
    // No se seleccionaron horas: insertar una sola fila con horas NULL
    $stmt->bind_param(
        "ssssiss",
        $motivo,
        $aula,
        $justificante,
        $tarea,
        $id_usuario,
        $fecha,
        $horas
    );

    if (!$stmt->execute()) {
        $all_ok = false;
    }
}

if ($all_ok) {
    header("Location: ausencia.php?ok=1");
    exit;
} else {
    echo "Error al enviar solicitud: " . $conexion->error;
}

