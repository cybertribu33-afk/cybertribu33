<?php
session_start();
require_once "conexion.php";

// Variables para filtro
$id_usuario_filtro = isset($_GET['usuario']) ? intval($_GET['usuario']) : null;
$dia_semana_filtro = isset($_GET['dia_semana']) ? $_GET['dia_semana'] : null;
$hora_filtro = isset($_GET['hora']) ? $_GET['hora'] : null;

// Mapeo de días de semana en español
$dias_semana_map = array(
    'lunes' => 'Monday',
    'martes' => 'Tuesday',
    'miercoles' => 'Wednesday',
    'jueves' => 'Thursday',
    'viernes' => 'Friday',
    'sabado' => 'Saturday',
    'domingo' => 'Sunday'
);

// Consulta: contador de guardias cubiertas por cada profesor (total)
$sql_counts = "SELECT u.id_usuario, u.nombre, COUNT(gr.id_ausencia) AS contador
               FROM usuario u
               LEFT JOIN guardias_realizadas gr ON u.id_usuario = gr.id_usuario
               GROUP BY u.id_usuario
               ORDER BY contador DESC, u.nombre";
$counts_result = $conexion->query($sql_counts);

// Consulta para filtrado detallado por usuario y día de semana
$detailed_result = null;
if ($id_usuario_filtro) {
    $sql_detailed = "SELECT gr.id_ausencia, a.fecha, a.horas, a.motivo, 
                            u2.nombre AS profesor_ausente,
                            DAYNAME(a.fecha) AS dia_semana
                     FROM guardias_realizadas gr
                     JOIN ausencia a ON gr.id_ausencia = a.id_ausencia
                     JOIN usuario u2 ON a.id_usuario = u2.id_usuario
                     WHERE gr.id_usuario = ?";
    
    if ($dia_semana_filtro) {
        $sql_detailed .= " AND DAYNAME(a.fecha) = ?";
    }
    
    if ($hora_filtro) {
        $sql_detailed .= " AND a.horas = ?";
    }
    
    $sql_detailed .= " ORDER BY a.fecha DESC, a.horas";
    
    $stmt = $conexion->prepare($sql_detailed);
    
    if ($dia_semana_filtro && $hora_filtro) {
        $stmt->bind_param("iss", $id_usuario_filtro, $dia_semana_filtro, $hora_filtro);
    } elseif ($dia_semana_filtro) {
        $stmt->bind_param("is", $id_usuario_filtro, $dia_semana_filtro);
    } else {
        $stmt->bind_param("i", $id_usuario_filtro);
    }
    
    $stmt->execute();
    $detailed_result = $stmt->get_result();
}

// Obtener lista de usuarios para el select
$sql_usuarios = "SELECT id_usuario, nombre FROM usuario ORDER BY nombre";
$usuarios_list = $conexion->query($sql_usuarios);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de guardias - CPIFP Bajo Aragón</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Contador de guardias</h1>
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
<main style="padding:18px;">
    <section>
        <h2>Guardias totales por profesor</h2>
        <table class="contador-table">
            <thead>
                <tr>
                    <th>Profesor</th>
                    <th>Guardias</th>
                    <th>Ver detalle</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($counts_result && $counts_result->num_rows > 0): ?>
                <?php while ($c = $counts_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['nombre']) ?></td>
                        <td><?= $c['contador'] ?></td>
                        <td>
                            <a href="?usuario=<?= $c['id_usuario'] ?>" class="detalle-link">Ver →</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay datos</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </section>

    <?php if ($id_usuario_filtro && $detailed_result): ?>
    <section class="detalle-section">
        <h2>Detalle de ausencias cubiertas</h2>
        
        <div class="filtros-section">
            <form method="get">
                <input type="hidden" name="usuario" value="<?= $id_usuario_filtro ?>">
                
                <label>
                    Día de la semana:
                    <select name="dia_semana">
                        <option value="">Todos</option>
                        <option value="Monday" <?= $dia_semana_filtro === 'Monday' ? 'selected' : '' ?>>Lunes</option>
                        <option value="Tuesday" <?= $dia_semana_filtro === 'Tuesday' ? 'selected' : '' ?>>Martes</option>
                        <option value="Wednesday" <?= $dia_semana_filtro === 'Wednesday' ? 'selected' : '' ?>>Miércoles</option>
                        <option value="Thursday" <?= $dia_semana_filtro === 'Thursday' ? 'selected' : '' ?>>Jueves</option>
                        <option value="Friday" <?= $dia_semana_filtro === 'Friday' ? 'selected' : '' ?>>Viernes</option>
                    </select>
                </label>
                
                <label>
                    Hora:
                    <select name="hora">
                        <option value="">Todas</option>
                        <option value="Primera" <?= $hora_filtro === 'Primera' ? 'selected' : '' ?>>Primera</option>
                        <option value="Segunda" <?= $hora_filtro === 'Segunda' ? 'selected' : '' ?>>Segunda</option>
                        <option value="Tercera" <?= $hora_filtro === 'Tercera' ? 'selected' : '' ?>>Tercera</option>
                        <option value="Cuarta" <?= $hora_filtro === 'Cuarta' ? 'selected' : '' ?>>Cuarta</option>
                        <option value="Quinta" <?= $hora_filtro === 'Quinta' ? 'selected' : '' ?>>Quinta</option>
                        <option value="Sexta" <?= $hora_filtro === 'Sexta' ? 'selected' : '' ?>>Sexta</option>
                    </select>
                </label>
                
                <button type="submit">Filtrar</button>
                <a href="contador_guardias.php">Limpiar</a>
            </form>
        </div>

        <table class="contador-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Profesor ausente</th>
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($detailed_result->num_rows > 0): ?>
                <?php while ($d = $detailed_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $d['fecha'] ?></td>
                        <td><?= $d['horas'] ?></td>
                        <td><?= htmlspecialchars($d['profesor_ausente']) ?></td>
                        <td><?= htmlspecialchars($d['motivo'] ?? '-') ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No hay registros con los filtros aplicados</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </section>
    <?php endif; ?>
</main>
</body>
</html>
