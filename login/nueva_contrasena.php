<?php
session_start();

if (!isset($_SESSION['id_usuario_cambio'])) {
    die("Acceso no permitido");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva contraseña</title>
    <link rel="stylesheet" href="restablecer.css">
</head>
<body>
    <div class="container">
        <h2>Escribe tu nueva contraseña</h2>
        <form action="cambiar_contrasena.php" method="POST">
            <label for="contrasena">Nueva contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <label for="confirmar">Confirmar contraseña:</label>
            <input type="password" id="confirmar" name="confirmar" required>

            <button type="submit">Cambiar contraseña</button>
        </form>
    </div>
</body>
</html>
