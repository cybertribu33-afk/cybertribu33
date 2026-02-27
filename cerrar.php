<?php
//abrimos la sesion, destruimos la sesion y que nos lleve al login
session_start();
session_destroy();
header("Location: login/index.html", true, 301);
?>