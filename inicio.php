<?php
session_start();
require_once "conexion.php";

// Permitir seleccionar una fecha vía GET (format YYYY-MM-DD). Por defecto hoy.
$selected_date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_date)) {
        $selected_date = date('Y-m-d');
}
$date_esc = $conexion->real_escape_string($selected_date);

// Cambiamos 'motivo' por 'tarea'
$sql = "SELECT a.id_ausencia, a.fecha, a.horas, a.tarea, a.aula,
                             u.nombre AS profesor,
                             gr.id_usuario AS id_cubierto,
                             u2.nombre AS cubierto_por
                FROM ausencia a
                JOIN usuario u ON a.id_usuario = u.id_usuario
                LEFT JOIN guardias_realizadas gr ON a.id_ausencia = gr.id_ausencia
                LEFT JOIN usuario u2 ON gr.id_usuario = u2.id_usuario
                WHERE a.estado = 'aceptado'
                    AND DATE(a.fecha) = '" . $date_esc . "'
                ORDER BY a.fecha, a.horas";


$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardias CPIFP Bajo Aragón</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Guardias CPIFP Bajo Aragón</h1>
    <nav class="nav">
        <?php $current = basename($_SERVER['PHP_SELF']); ?>
        <a href="inicio.php" <?php if($current=='inicio.php') echo 'class="active"'; ?>>Inicio</a>
        <a href="contador_guardias.php" <?php if($current=='contador_guardias.php') echo 'class="active"'; ?>>Contadores</a>
        <a href="Admin_usuarios/usuarios.php" <?php if($current=='usuarios.php') echo 'class="active"'; ?>>Administrar usuarios</a>
        <a href="Ausencia/ausencia.php" <?php if($current=='ausencia.php') echo 'class="active"'; ?>>Ausencia</a>
        <a href="guia.html" <?php if($current=='guia.html') echo 'class="active"'; ?>>Guía</a>
        <a href="bandeja/admin_ausencias.php" <?php if($current=='admin_ausencias.php') echo 'class="active"'; ?>>Bandeja</a>
        <a href="historial/historial_ausencias.php" <?php if($current=='historial_ausencias.php') echo 'class="active"'; ?>>Historial</a>
        <a href="cerrar.php" <?php if($current=='cerrar.php') echo 'class="active"'; ?>>Cerrar sesión</a>
        <span class="nav-indicator"></span>
    </nav>
</header>

<main>

    <h1>Tabla de guardias</h1>
    <div class="date-nav" style="margin-bottom:12px; display:flex; align-items:center; gap:8px;">
        <form method="get" action="inicio.php" style="display:inline;">
            <button type="submit" name="date" value="<?= date('Y-m-d', strtotime($selected_date . ' -1 day')) ?>">Anterior</button>
        </form>

        <form method="get" action="inicio.php" style="display:inline;">
            <input type="date" name="date" value="<?= $selected_date ?>" onchange="this.form.submit()" />
        </form>

        <form method="get" action="inicio.php" style="display:inline;">
            <button type="submit" name="date" value="<?= date('Y-m-d') ?>">Hoy</button>
        </form>

        <form method="get" action="inicio.php" style="display:inline;">
            <button type="submit" name="date" value="<?= date('Y-m-d', strtotime($selected_date . ' +1 day')) ?>">Siguiente</button>
        </form>

        <span style="margin-left:12px; font-weight:600;">Fecha: <?= $selected_date ?></span>
    </div>

    <section class="section active">
   <table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Profesor ausente</th>
            <th>Tarea</th>
            <th>Aula</th>
            <th>Cubierta por</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['fecha'] ?></td>
                <td><?= $row['horas'] ?></td>
                <td><?= $row['profesor'] ?></td>
                <td><?= $row['tarea'] ?></td>
                <td><?= $row['aula'] ?></td>
                <td><?= $row['cubierto_por'] ?? '-' ?></td> <!-- Aquí mostramos quién cubrió -->
                <td>
                    <?php if(!$row['cubierto_por']): ?> <!-- Botón solo si no está cubierta -->
                    <form action="apuntarse_guardia.php" method="POST">
                        <input type="hidden" name="id_ausencia" value="<?= $row['id_ausencia'] ?>">
                        <input type="hidden" name="fecha" value="<?= $row['fecha'] ?>">
                        <input type="hidden" name="hora" value="<?= $row['horas'] ?>">
                        <input type="hidden" name="tarea" value="<?= $row['tarea'] ?>">
                        <button type="submit">Apuntarme</button>
                    </form>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No hay guardias disponibles</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>



    </section>

</main>

<script>
const links = document.querySelectorAll('.nav a');
const indicator = document.querySelector('.nav-indicator');

function moveIndicator(el) {
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
