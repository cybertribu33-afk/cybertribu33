<?php
require_once "../conexion.php";
echo "holamundo";
if (!isset($_POST['usuario'], $_POST['email'])) {
    die("Datos no recibidos");
}
$username = $_POST['username'];
$email    = $_POST['email'];

$codigo = random_int(100000, 999999);
$expira = date("Y-m-d H:i:s", strtotime("+15 minutes"));

$sql = "UPDATE PROFESOR
        SET codigo_recuperacion = ?, codigo_expira = ?
        WHERE username = ? AND email = ?";


$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssss", $codigo, $expira, $username, $email);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    mail($email, "Recuperación de contraseña",
         "Tu código de recuperación es: $codigo");
    header("Location: verificar_codigo.php");
} else {
    echo "Usuario o correo incorrectos";
}

