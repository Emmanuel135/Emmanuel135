<?php 
session_start();
include( $_SERVER['DOCUMENT_ROOT'].'/nutriologo/connect.php'); 
$id = $_SESSION['id'];
$obj = $_POST['obj'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];

mysqli_query($conexion,"update usuario set idobjetivos = '$obj', genero = '$genero',edad = '$edad',peso = '$peso',altura = '$altura' where idusuario = '$id'");
mysqli_close($conexion);
?>