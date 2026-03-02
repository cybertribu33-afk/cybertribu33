<?php
$clave_plana = "1"; // la contraseña que quieres guardar
$hash = password_hash($clave_plana, PASSWORD_DEFAULT);

echo $hash;
?>
