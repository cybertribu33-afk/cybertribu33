<?php
session_start();
require_once('../conexion.php');

// Simulación de docente logueado
$id_usuario = $_SESSION['id_usuario'] ?? 0;
if (!$id_usuario) die("Debes iniciar sesión");

// Traer nombre del docente
$sql_user = "SELECT nombre, apellido FROM usuario WHERE id_usuario=?";
$stmt = $conexion->prepare($sql_user);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$res_user = $stmt->get_result();
$usuario = $res_user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Ausencia</title>
    <link rel="stylesheet" href="ausenciacss.css">
</head>
<body>
<header>
    <h1>Guardias CPIFP Bajo Aragón</h1>
    <?php $current = basename($_SERVER['PHP_SELF']); ?>
    <nav class="nav">
        <a href="../inicio.php" <?php if($current=='inicio.php') echo 'class="active"'; ?>>Inicio</a>
        <a href="../contador_guardias.php" <?php if($current=='contador_guardias.php') echo 'class="active"'; ?>>Contadores</a>
        <a href="../Admin_usuarios/usuarios.php" <?php if($current=='usuarios.php') echo 'class="active"'; ?>>Administrar usuarios</a>
        <a href="../Ausencia/ausencia.php" <?php if($current=='ausencia.php') echo 'class="active"'; ?>>Ausencia</a>
        <a href="../guia.html" <?php if($current=='guia.html') echo 'class="active"'; ?>>Guía</a>
        <a href="../bandeja/admin_ausencias.php" <?php if($current=='admin_ausencias.php') echo 'class="active"'; ?>>Bandeja</a>
        <a href="../historial/historial_ausencias.php" <?php if($current=='historial_ausencias.php') echo 'class="active"'; ?>>Historial</a>
        <a href="../cerrar.php" <?php if($current=='cerrar.php') echo 'class="active"'; ?>>Cerrar sesión</a>
        <span class="nav-indicator"></span>
    </nav>
</header>

<h1>Registrar Ausencia</h1>
<form action="enviar_ausencia.php" method="POST" enctype="multipart/form-data">

    <p>Docente: <?= htmlspecialchars($usuario['nombre'].' '.$usuario['apellido']) ?></p>
    <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">

    <label>Fecha de ausencia:</label>
    <input type="date" name="fecha" required><br><br>

    <label>Motivo:</label>
    <input type="text" name="motivo" required><br><br>

    <label>Aula:</label>
    <input type="text" name="aula" id="aula" required><br><br>

    <label>Horas:</label>
    <div class="horas-container">
        <label><input type="checkbox" name="horas[]" value="Primera"> Primera</label>
        <label><input type="checkbox" name="horas[]" value="Segunda"> Segunda</label>
        <label><input type="checkbox" name="horas[]" value="Tercera"> Tercera</label>
        <label><input type="checkbox" name="horas[]" value="Cuarta"> Cuarta</label>
        <label><input type="checkbox" name="horas[]" value="Quinta"> Quinta</label>
        <label><input type="checkbox" name="horas[]" value="Sexta"> Sexta</label>
    </div><br><br>

    <label>Archivo justificante (PDF):</label>
    <input type="file" name="justificante" accept="application/pdf"><br><br>

    <label>Archivo tarea (PDF):</label>
    <input type="file" name="tarea" accept="application/pdf"><br><br>

    <button type="submit">Enviar solicitud</button>
</form>

<!-- Aula es independiente de Motivo; comparten solo atributos (ambos son tipo text y required) -->
