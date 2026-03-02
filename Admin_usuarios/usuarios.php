<?php
require_once "../check_admin.php";
require_once "../conexion.php";

// Obtener usuarios
$sql = "SELECT nombre, apellido, dni, correo, rol, familia FROM usuario";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar usuarios</title>
    <link rel="stylesheet" href="../style.css">
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

<main>
    <div class="usuarios-container">

        <!-- CREAR USUARIO -->
        <h2>Registrar Usuario</h2>

        <form class="card" action="validarusuario.php" method="POST">

            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellido:</label>
            <input type="text" name="apellido" required>

            <label>DNI:</label>
            <input type="text" name="dni" required>

            <div class="rol-field">
                <label>Rol:</label>
                <div class="rol-container">
                    <label><input type="radio" name="rol" value="Administrador" required> Administrador</label>
                    <label><input type="radio" name="rol" value="Docente" required> Docente</label>
                </div>
            </div>

            <label>Correo:</label>
            <input type="email" name="correo" required>

            <label>Familia:</label>
            <input type="text" name="familia" required>

            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>

            <div class="btn-container">
                <button type="submit" class="btn">Registrar</button>
            </div>
        </form>

        <!-- LISTADO DE USUARIOS -->
        <h2>Usuarios registrados</h2>

        <table class="usuarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Familia profesional</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado && $resultado->num_rows > 0): ?>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['nombre']) ?></td>
                            <td><?= htmlspecialchars($fila['apellido']) ?></td>
                            <td><?= htmlspecialchars($fila['dni']) ?></td>
                            <td><?= htmlspecialchars($fila['correo']) ?></td>
                            <td><?= htmlspecialchars($fila['rol']) ?></td>
                            <td><?= htmlspecialchars($fila['familia']) ?></td>
                            <td>
                                <a href="editar_usuario.php?dni=<?= $fila['dni'] ?>">✏️</a>
                                <a href="eliminar_usuario.php?dni=<?= $fila['dni'] ?>"
                                   onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                   🗑️
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
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
