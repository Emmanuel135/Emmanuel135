<?php
include('connect.php');
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$consulta = "select * from usuario where correo = '$correo' and pass = '$pass'";
date_default_timezone_set('America/Mazatlan');
$ahora = date("Y-n-j H:i:s");
$resultado = mysqli_query($conexion,$consulta) or die("Error al verificar usuario");
$fila = mysqli_fetch_array($resultado);
if($fila['idusuario'] != ""){    
$consulta = "update usuario set sesion = 'abierta',ultimo_acceso = '$ahora' where idusuario = ".$fila['idusuario'];
mysqli_query($conexion,$consulta) or die("Error al registrar sesion");
session_start();
$_SESSION['id'] = $fila['idusuario'];
$_SESSION['nombre'] = $fila['nombre']." ".$fila['apellidos'];
$_SESSION['sesion'] = "activa";
mysqli_query($conexion,"select iddieta from dieta where idusuario = ".$fila['idusuario']);
$fila = mysqli_fetch_array($resultado);
if($fila['iddieta'] == "")header('Location:/nutriologo/introduccion');
else
header('Location:index.php');
mysqli_close($conexion);
}else{
    echo "
    <html>
    <script>	
        alert('Usuario o contraseña incorrectos');
        location.href='index.php';	
</script>
    </html>"   ;
}
?>