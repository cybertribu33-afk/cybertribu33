<?php
require_once "../conexion.php";

$sql = "
SELECT 
    a.id_ausencia,
    a.fecha,
    a.horas,
    a.motivo,
    a.estado,
    u.nombre,
    u.apellido,
    a.justificante,
    a.tarea,
    u2.nombre AS cubierto_por,
    u2.apellido AS cubierto_apellido
FROM ausencia a
JOIN usuario u ON a.id_usuario = u.id_usuario
LEFT JOIN guardias_realizadas gr ON a.id_ausencia = gr.id_ausencia
LEFT JOIN usuario u2 ON gr.id_usuario = u2.id_usuario
ORDER BY a.fecha DESC, a.horas ASC
";

$res = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

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
<head>
    <meta charset="UTF-8">
    <title>Historial de Ausencias</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>Historial de Ausencias</h1>

<table border="1">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Docente</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Justificante</th>
            <th>Tarea</th>
            <th>Cubierta por</th>
        </tr>
    </thead>
    <tbody>
        <?php while($fila = $res->fetch_assoc()): ?>
        <tr>
            <td><?= $fila['fecha'] ?></td>
            <td><?= $fila['horas'] ?></td>
            <td><?= $fila['nombre'].' '.$fila['apellido'] ?></td>
            <td><?= $fila['motivo'] ?></td>
            <td><?= $fila['estado'] ?></td>
            <td>
                <?php if($fila['justificante']): ?>
                    <a href="<?= $fila['justificante'] ?>" target="_blank">Ver PDF</a>
                <?php endif; ?>
            </td>
            <td>
                <?php if($fila['tarea']): ?>
                    <a href="<?= $fila['tarea'] ?>" target="_blank">Ver PDF</a>
                <?php endif; ?>
            </td>
            <td><?= isset($fila['cubierto_por']) ? $fila['cubierto_por'].' '.($fila['cubierto_apellido'] ?? '') : '-' ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
const links = document.querySelectorAll('.nav a');
const indicator = document.querySelector('.nav-indicator');

function moveIndicator(el) {
    if (!indicator) return;
    indicator.style.width = el.offsetWidth + 'px';
    indicator.style.left = el.offsetLeft + 'px';
}

links.forEach(link => {
    link.addEventListener('click', () => {
        moveIndicator(link);
    });
});

window.onload = () => {
    const active = document.querySelector('.nav a.active');
    if (active) moveIndicator(active);
};
</script>

</body>
</html>
