
<?php // verifica si hay una sesion iniciada si no lo hay muestra el formulario de inicio de sesion
session_start();
if(isset($_SESSION['nombre']))
$nombre = $_SESSION['nombre'];

if (isset($_SESSION['sesion'])){
    if(!isset($_SESSION['verificada']))
    header('Location:verificarSesion.php?pagina=index');
    else {unset($_SESSION['verificada']); 
    echo "<html>
    <title>NutriBot.com</title>
    <!--Importar archivo CSS-->
    <link rel= stylesheet  type= text/css href=estilos.css>
    <header bgcolor = gray>
            <h1  align = center ><a href = index.php>NutriBot</a></h1> 
            <div class=portada></div>
            <h3>
                Usuario: $nombre&nbsp;&nbsp; <a href = perfil.php>Perfil</a>&nbsp;&nbsp;
                    <a href = cerrarSesion.php>Cerrar Sesion</a> </h3>
    </header>    
 </html>";
    }
    
    
}else{
    echo "<html>   
    <header>  <link rel='stylesheet' type='text/css' href='estilos.css'>
    <h1  align = center ><a href = index.php>NutriBot</a></h1>
    <h3>
    <a href = registro.php>Registrarse</a>&nbsp;&nbsp;&nbsp;&nbsp; </h3>
    </header>
        <body>
            <br>
            <br> 
            <br>
            <form action='iniciarsesionBD.php' method = post onsubmit = 'return validar()'>
            <table align = center>
                <tr>
                    <td align = center colspan = 2>Iniciar Sesión</td>
                </tr>
                <tr>
                    <td>Correo: </td> <td><input type='text' id = correo name = correo></td>
                </tr>
                <tr>
                    <td>Contraseña: </td><td><input type='password' id = pass name = pass></td>
                </tr>
                <tr>
                    <td align = center colspan = 2><button>Ingresar</button></td>
                </tr>
                <tr>
                    <td colspan = 2> No tienes cuenta? <a href = 'registro.php'>Registrate aqui.</a></td>
                </tr>
            </table>
            </form>
            
        </body>
</html>

<script>
    function validar(){
var correo,pass;
correo = document.getElementById('correo').value;
pass = document.getElementById('pass').value;

if(correo == '' || pass == ''){
  alert('No puede dejar campos vacios');
  return false;
}else if(correo.length >45 || pass.length > 45){
  alert('El correo y el usuario no pueden tener mas de 45 caracteres');
  return false;
}
    }
    </script>";
}
?>


