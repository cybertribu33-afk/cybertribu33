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
    <nav class="nav">
    <a href="index.html">Inicio</a>
    <a href="../contador_guardias.php">Contadores</a>
    <a href="usuarios.html">Administrar usuarios</a>
    <a href="ausencia.html" class="active">Ausencia</a>
    <a href="guia.html">Guía</a>
    <a href="registro.html">Registro</a>
    <span class="nav-indicator"></span>
    </nav>
</header>

<main>
    <div class="usuarios-container">

        <!-- CREAR USUARIO -->
        <div class="card">
            <h2>Crear usuario</h2>

            <div class="form-box">
                <label>Nombre de usuario:</label>
                <input type="text">

                <label>Contraseña:</label>
                <input type="password">

                <label>Correo:</label>
                <input type="email">
            </div>

            <button class="btn">Crear</button>
        </div>

        <!-- ELIMINAR USUARIO -->
        <table class="usuarios">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Familia profesional</th>
        </tr>
    </thead>
</table>
</main>

</body>
</html>
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