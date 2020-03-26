<?php
 include('connect.php');
 session_start();
 $pagina = urldecode($_GET['pagina']);
 if(isset($_SESSION['id']))
 {
    $idusuario = $_SESSION['id'];
  $pagina = urldecode($_GET['pagina']);
  echo "<script>alert('$pagina');</script>";
 $consulta = "SELECT * FROM usuario WHERE idusuario = '".$idusuario."'";
   $resultado = mysqli_query($conexion,$consulta); //or die("Error al consultar usuario");
  $fila = mysqli_fetch_array($resultado);
  
   if($fila['sesion'] == "abierta"){
       date_default_timezone_set('America/Mazatlan');
       $ahora = date("Y-n-j H:i:s");
       
       $ultima_atv = $fila['ultimo_acceso'];
       $tiempo_transcurrido = (strtotime($ahora)-strtotime($ultima_atv)); //echo $ahora."-".$ultima_atv." = ".$tiempo_transcurrido;
       if($tiempo_transcurrido > 3600){
           // Si no hay actividad durante 1 hra se cierra la sesion
           $consulta = "update usuario set sesion = 'cerrada' where idusuario = $idusuario";
           mysqli_query($conexion,$consulta); mysqli_close($conexion);
           session_destroy();
           header("Location: /nutriologo/index.php?sesion=caducada");
           
           
       }else{
           //si el tiempo no ha excedido 1hra entonces se actualiza el ultimo acceso 
           $consulta = "update usuario set ultimo_acceso = '$ahora' where idusuario = $idusuario";
           mysqli_query($conexion,$consulta); mysqli_close($conexion);  
           $_SESSION['verificada'] = 1;
           header("Location:$pagina.php");
           
       }
   }else{ unset($_SESSION['sesion']); header("Location:$pagina.php");}
 }
 else
 {
    header("Location: /nutriologo/index.php");
 }
  
?>