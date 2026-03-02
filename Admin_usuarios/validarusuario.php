<?php
require_once "../conexion.php";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $rol = $_POST["rol"] ?? null;
    $correo = $_POST["correo"];
    $familia = $_POST["familia"];
    $password = password_hash($_POST["contraseña"], PASSWORD_BCRYPT);
    $sql = "INSERT INTO usuario (dni, nombre, apellido, correo, contraseña, rol, familia) 
            VALUES ('$dni', '$nombre', '$apellido', '$correo', '$password', '$rol', '$familia')";

    // Ejecutar la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        echo "<script>console.log('Registro exitoso')</script>";
        header("Location: index.html", true, 301);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
    header("Location: index.html", true, 301);
echo "Registrado exitosamente";
?>