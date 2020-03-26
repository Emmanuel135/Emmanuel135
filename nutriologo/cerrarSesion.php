<?php
session_start();
include('connect.php');
$id = $_SESSION['id'];
$consulta = "update usuario set sesion = 'cerrada' where idusuario= $id";
mysqli_query($conexion,$consulta) or die("Error al cerrar sesion");
echo "<script>
localStorage.setItem('idusuario','0');
location.href = 'index.php';
</script>";
?>