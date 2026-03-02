<?php
// Incluye el archivo de conexión a la base de datos
require_once "../conexion.php";

// Comprueba si NO se ha enviado el 'dni' por la URL
// Si no existe, redirige a usuarios.php y termina el script
if (!isset($_GET['dni'])) {
    header("Location: usuarios.php");
    exit;
}

// Obtiene el DNI enviado por GET
$dni = $_GET['dni'];

// Consulta SQL para obtener los datos del usuario con ese DNI
// Se usan marcadores (?) para evitar inyección SQL
$sql = "SELECT nombre, apellido, dni, correo, rol, familia 
        FROM usuario WHERE dni = ?";

// Prepara la consulta SQL
$stmt = $conexion->prepare($sql);

// Asocia el DNI al marcador de la consulta
// "s" indica que el parámetro es de tipo string
$stmt->bind_param("s", $dni);

// Ejecuta la consulta
$stmt->execute();

// Obtiene el resultado de la consulta
$resultado = $stmt->get_result();

// Convierte el resultado en un array asociativo
$usuario = $resultado->fetch_assoc();

// Si no se encuentra ningún usuario con ese DNI
// redirige a usuarios.php y termina el script
if (!$usuario) {
    header("Location: usuarios.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">

    <!-- Título de la página -->
    <title>Editar usuario</title>

    <!-- Enlace a la hoja de estilos -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<!-- Título del formulario -->
<h2>Editar usuario</h2>

<!-- Formulario para actualizar los datos del usuario -->
<!-- Envía los datos a actualizar_usuario.php mediante POST -->
<form class="card" action="actualizar_usuario.php" method="POST">

    <!-- Campo oculto que guarda el DNI original -->
    <!-- Se usa para identificar al usuario aunque se cambie el DNI -->
    <input type="hidden" name="dni_original" value="<?= $usuario['dni'] ?>">

    <!-- Campo nombre -->
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required>

    <!-- Campo apellido -->
    <label>Apellido:</label>
    <input type="text" name="apellido" value="<?= $usuario['apellido'] ?>" required>

    <!-- Campo DNI -->
    <label>DNI:</label>
    <input type="text" name="dni" value="<?= $usuario['dni'] ?>" required>

    <!-- Campo correo electrónico -->
    <label>Correo:</label>
    <input type="email" name="correo" value="<?= $usuario['correo'] ?>" required>

    <!-- Campo rol -->
    <div class="rol-field">
        <label>Rol:</label>
        <div class="rol-container">
            <label><input type="radio" name="rol" value="Administrador" <?= $usuario['rol'] === 'Administrador' ? 'checked' : '' ?> required> Administrador</label>
            <label><input type="radio" name="rol" value="Docente" <?= $usuario['rol'] === 'Docente' ? 'checked' : '' ?> required> Docente</label>
        </div>
    </div>

    <!-- Campo familia profesional -->
    <label>Familia:</label>
    <input type="text" name="familia" value="<?= $usuario['familia'] ?>" required>

    <!-- Botón para guardar los cambios -->
    <button type="submit" class="btn">Guardar cambios</button>

    <!-- Enlace para cancelar y volver a la lista de usuarios -->
    <a href="usuarios.php" class="btn">Cancelar</a>

</form>

</body>
</html>
