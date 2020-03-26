<?php
include('connect.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$consulta = "select correo from usuario where correo = '$correo'";
$resultado = mysqli_query($conexion,$consulta); 
$fila = mysqli_fetch_array($resultado);

if($fila['correo'] == ""){
    //Si el correo no esta registrado
    $consulta = "insert into usuario(nombre,apellidos,correo,pass) values('$nombre','$apellido','$correo','$pass')";
mysqli_query($conexion,$consulta) or die("Error al registrar usuario");
} else {
    //si el correo si esta registrado
 echo "<html>
 <meta http-equiv='refresh' content='1;URL=index.php'>
 <script> alert('El correo ya se se encuentra registrado, por favor utilice otro');</script>
 </html>";
}
mysqli_close($conexion);
?>
<html>
<meta http-equiv='refresh' content='1;URL=index.php'>
<script> alert('Registrado correctamente');</script>
</html>