<!DOCTYPE html>
<!-- Define el tipo de documento como HTML5 -->
<html lang="es">
<!-- Idioma del documento: español -->

<head>
    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">

    <!-- Título que aparece en la pestaña del navegador -->
    <title>Administrar usuarios</title>

    <!-- Enlace a la hoja de estilos externa -->
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Estilos específicos para administrar usuarios */
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        main {
            background: linear-gradient(135deg, #f8f9fa 0%, #f0f2f5 100%);
            padding: 40px 20px;
            min-height: calc(100vh - 100px);
        }

        .usuarios-container > div:first-child {
            background: white;
            width: fit-content;
            margin: 0 auto 50px;
            text-align: center;
            padding: 25px 60px;
            font-size: 26px;
            border-radius: 12px;
            font-weight: 600;
            color: #2c3e50;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            letter-spacing: 0.3px;
        }

        /* ===== FORMULARIO MEJORADO ===== */
        form.card {
            background: white;
            width: 500px;
            max-width: 95%;
            margin: 0 auto 50px;
            padding: 40px;
            border-radius: 14px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        form.card p {
            font-size: 15px;
            margin-bottom: 25px;
            color: #34495e;
            font-weight: 500;
        }

        form.card label {
            display: block;
            font-weight: 600;
            margin-top: 22px;
            margin-bottom: 8px;
            font-size: 13px;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        form.card input[type="text"],
        form.card input[type="email"],
        form.card input[type="correo"],
        form.card input[type="password"],
        form.card input[type="date"] {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1.5px solid #e0e6ed;
            background: #f8f9fa;
            transition: all 0.3s ease;
            font-size: 14px;
            color: #2c3e50;
            box-sizing: border-box;
        }

        form.card input::placeholder {
            color: #95a5a6;
        }

        form.card input:focus {
            outline: none;
            border-color: #75b1c4;
            background: white;
            box-shadow: 0 0 0 3px rgba(117, 177, 196, 0.1);
            transform: translateY(-1px);
        }

        form.card #ojo {
            display: block;
            margin-top: -38px;
            margin-bottom: 16px;
            margin-right: 12px;
            float: right;
            cursor: pointer;
            width: 20px;
            height: 20px;
            opacity: 0.5;
            transition: all 0.2s ease;
        }

        form.card #ojo:hover {
            opacity: 0.8;
        }

        form.card .btn-container {
            text-align: center;
            margin-top: 35px;
            clear: both;
        }

        form.card .btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #75b1c4 0%, #5f99aa 100%);
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(95, 153, 170, 0.25);
            letter-spacing: 0.3px;
        }

        form.card .btn:hover {
            background: linear-gradient(135deg, #5f99aa 0%, #4a7f8f 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(95, 153, 170, 0.35);
        }

        form.card .btn:active {
            transform: translateY(0);
        }

        .rol-field {
            margin-top: 22px;
        }

        /* ===== ROL CONTAINER ===== */
        .rol-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 10px;
        }

        .rol-container label {
            display: flex;
            align-items: center;
            margin: 0;
            padding: 12px 14px;
            background: #f8f9fa;
            border: 1.5px solid #e0e6ed;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 13px;
            color: #2c3e50;
            text-transform: none;
            letter-spacing: 0;
        }

        .rol-container label:hover {
            background: #f0f3f7;
            border-color: #75b1c4;
        }

        .rol-container input[type="radio"] {
            margin-right: 8px;
            cursor: pointer;
            width: 16px;
            height: 16px;
            accent-color: #75b1c4;
        }

        .rol-container label:has(input[type="radio"]:checked) {
            background: #e8f4f9;
            border-color: #75b1c4;
            font-weight: 600;
            color: #75b1c4;
        }

        /* Tabla de usuarios mejorada */
        .usuarios-table-container {
            background: white;
            width: 95%;
            max-width: 1100px;
            margin: 0 auto;
            border-radius: 14px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        table.usuarios {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        table.usuarios thead {
            background: linear-gradient(135deg, #75b1c4 0%, #5f99aa 100%);
        }

        table.usuarios th {
            padding: 16px;
            color: white;
            font-weight: 600;
            text-align: left;
            border: none;
            font-size: 13px;
            letter-spacing: 0.3px;
        }

        table.usuarios td {
            padding: 14px 16px;
            border-bottom: 1px solid #f0f2f5;
            font-size: 14px;
            color: #34495e;
        }

        table.usuarios tbody tr {
            transition: all 0.2s ease;
        }

        table.usuarios tbody tr:hover {
            background: #f8f9fa;
        }
    </style>
</head>

<body>

<!-- CABECERA DE LA PÁGINA -->
<header>
    <!-- Título principal -->
    <h1>Guardias CPIFP Bajo Aragón</h1>

    <!-- Menú de navegación -->
    <nav class="nav">
        <a href="../index.html">Inicio</a>
        <a href="../contador_guardias.php">Contadores</a>
        <a href="/Ausencia/usuarios.php">Administrar usuarios</a>
        <a href="ausencia.html" class="active">Ausencia</a>
        <a href="guia.html">Guía</a>

        <!-- Indicador visual que se mueve bajo el enlace activo -->
        <span class="nav-indicator"></span>
    </nav>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main>
    <div class="usuarios-container">

        <!-- TÍTULO PARA CREAR USUARIO -->
        <div class="usuarios-container">Registrar Usuario</div>

        <!-- FORMULARIO PARA REGISTRAR USUARIO -->
        <!-- Envía los datos a validarusuario.php mediante POST -->
        <form class="card" action="validarusuario.php" method="POST">

            <!-- Campo nombre -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <!-- Campo apellido -->
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <!-- Campo DNI -->
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <!-- Campo rol -->
            <div class="rol-field">
                <label>Rol:</label>
                <div class="rol-container">
                    <label><input type="radio" name="rol" value="Administrador" required> Administrador</label>
                    <label><input type="radio" name="rol" value="Docente" required> Docente</label>
                </div>
            </div>
            <!-- Campo correo electrónico -->
            <label for="correo">Correo:</label>
            <input type="correo" id="correo" name="correo" required>

            <!-- Campo familia profesional -->
            <label for="familia">Familia:</label>
            <input type="text" id="familia" name="familia" required>
            
            <!-- Campo contraseña -->
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="contrasena" required>

            <!-- Imagen de un ojo para mostrar/ocultar la contraseña -->
            <img id="ojo" src="ojoabierto.png" onclick="togglePassword()" width="24px" height="24px">

            <!-- Contenedor del botón de registro -->
            <div class="btn-container">
                <button type="submit" class="btn">Registrar</button>
            </div>
        </form>

        <!-- TABLA PARA ELIMINAR / MOSTRAR USUARIOS -->
        <div class="usuarios-table-container" style="margin-top: 60px;">
            <table class="usuarios">
                <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>DNI</th>
                        <th>Familia profesional</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los usuarios se cargarán aquí -->
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- SCRIPT PARA MOSTRAR Y OCULTAR EL FORMULARIO -->
<script>
function abrirform() {
  // Muestra el formulario con id "formregistrar"
  document.getElementById("formregistrar").style.display = "block";
}

function cancelarform() {
  // Oculta el formulario con id "formregistrar"
  document.getElementById("formregistrar").style.display = "none";
}
</script>

</body>
</html>

<!-- SCRIPT PARA EL INDICADOR DEL MENÚ DE NAVEGACIÓN -->
<script>
const links = document.querySelectorAll('.nav a');
const indicator = document.querySelector('.nav-indicator');

// Mueve el indicador debajo del enlace seleccionado
function moveIndicator(el) {
    indicator.style.width = el.offsetWidth + 'px';
    indicator.style.left = el.offsetLeft + 'px';
}

// Añade el movimiento del indicador al hacer clic
links.forEach(link => {
    link.addEventListener('click', () => {
        moveIndicator(link);
    });
});

// Al cargar la página, coloca el indicador en el enlace activo
window.onload = () => {
    const active = document.querySelector('.nav a.active');
    if (active) moveIndicator(active);
};
</script>
