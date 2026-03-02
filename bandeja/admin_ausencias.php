<?php
require_once "../check_admin.php";
require_once "../conexion.php";

// Traer todas las solicitudes pendientes
$sql = "SELECT a.id_ausencia, u.nombre, u.apellido, a.fecha, a.motivo, a.horas, a.justificante, a.tarea
        FROM ausencia a
        JOIN usuario u ON a.id_usuario = u.id_usuario
        WHERE a.estado='pendiente'";

$res = $conexion->query($sql);
?>
<head>
    <meta charset="UTF-8">
    <title>Guardias CPIFP Bajo Aragón</title>
    <link rel="stylesheet" href="../style.css">
</head>
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
<h1>Solicitudes de ausencias pendientes</h1>
<table border="1">
<tr>
    <th>Docente</th>
    <th>Fecha</th>
    <th>Motivo</th>
    <th>Horas</th>
    <th>Justificante</th>
    <th>Tarea</th>
    <th>Acciones</th>
</tr>

<?php while($fila = $res->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($fila['nombre'].' '.$fila['apellido']) ?></td>
    <td><?= $fila['fecha'] ?></td>
    <td><?= htmlspecialchars($fila['motivo']) ?></td>
    <td><?= htmlspecialchars($fila['horas']) ?></td>
    <td>
        <?php if($fila['justificante']): ?>
            <a href="<?= $fila['justificante'] ?>" target="_blank">Ver</a>
        <?php endif; ?>
    </td>
    <td>
        <?php if($fila['tarea']): ?>
            <a href="<?= $fila['tarea'] ?>" target="_blank">Ver</a>
        <?php endif; ?>
    </td>
    <td>
        <a href="aprobar_ausencia.php?id=<?= $fila['id_ausencia'] ?>">Aprobar</a> |
        <a href="rechazar_ausencia.php?id=<?= $fila['id_ausencia'] ?>">Rechazar</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

