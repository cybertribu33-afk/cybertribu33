<?php 
// Incluye el archivo que contiene la conexión a la base de datos de administrador
include_once("conexion_admin.php"); 
    
// Recoge el apellido enviado desde el formulario mediante POST
$apellido 	= $_POST['apellido'];

// Recoge el nombre enviado desde el formulario mediante POST
$nombre 	= $_POST['nombre'];

// Recoge el correo enviado desde el formulario mediante POST
$correo 	= $_POST['correo'];

// Recoge el rol enviado desde el formulario mediante POST
$rol 	    = $_POST['rol'];

// Recoge el DNI enviado desde el formulario mediante POST
$dni 	    = $_POST['dni'];
    
// Ejecuta una consulta SQL para insertar un nuevo usuario en la tabla "usuario"
// Se insertan los valores de apellido, nombre, correo, rol y dni
mysqli_query(
    $conexion,
    "INSERT INTO usuario(apellido,nombre,correo,rol,dni) 
     VALUES('$apellido','$nombre','$correo','$rol','$dni')"
);

// Redirige al usuario a la página administrar.php después de insertar el registro
header("Location:administrar.php");
?>	
