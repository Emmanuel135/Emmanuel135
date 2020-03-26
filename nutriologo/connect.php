<?php
$usuariobd = "root";
$host = "localhost:3307";
$clave = "";
$basededatos = "nutriologo";
$conexion = mysqli_connect($host,$usuariobd,$clave,$basededatos) or die("No se pudo conectar al servidor.");
mysqli_set_charset($conexion, 'utf8');
?>