<?php
session_start();
if(!isset($_SESSION['verificada']))
header('Location: /nutriologo/verificarSesion.php?pagina=%2fnutriologo%2fintroduccion%2findex');
else {unset($_SESSION['verificada']); 

    echo "<html>
    <title>NutriBot.com</title>
    <header bgcolor = gray>
            <h1  align = center ><a href = index.php>NutriBot</a></h1> 
            <div class=portada></div>
            <h3>
                Usuario: ".$_SESSION['nombre']."&nbsp;&nbsp; <a href = perfil.php>Perfil</a>&nbsp;&nbsp;
                    <a href = cerrarSesion.php>Cerrar Sesion</a> </h3>
    </header>    
 </html>";
}
?>
<html>   
    <header>  
    <link rel='stylesheet' type='text/css' href='/nutriologo/estilos.css'>
    <link rel="stylesheet" href='/nutriologo/animate.css'>
    <script src = '/nutriologo/jquery/jquery-3.4.1.min.js'></script>
    
    </header>
    <body>
        <div class = 'intro'>
            <div  class = 'titulo1 animated jackInTheBox delay-05s'>Bienvenido a NutriBot</div>
            <br>
            <br>
            <div class = 'texto animated fadeIn'>NutriBot es un Sistema experto en nutrición que te ayudará a crear una dieta unica para ti, para 
            que puedas lograr tus objetivos.
            <br>
            <br>
            A continuación te haremos una serie de preguntas para poder asignarte una dieta correcta.
            </div>
            <br>
            <br>
            <div class = 'siguiente'>
                <button class = 'btnSig' onclick = 'siguiente1()'>Siguiente</button>
            </div>

        </div>
    </body>
    <script>
         const intro =  document.querySelector('.intro');
     var idobjetivos;
        function siguiente1(){
          /*  intro.classList.add('animated','fadeOutLeft');
            intro.classList.remove('fadeOutLeft'); 
            intro.classList.add('fadeInRight');*/
            intro.innerHTML = "<div class = 'titulo1'>¿Cuál es tu objetivo?</div> <br>"+
    "<div>¿Qué es lo que quieres lograr con tu dieta? <br>"+
    "Elige de entre los objetivos que tenemos el que mejor se adapte a ti</div> <br>"+ 
    "<div id = select1><select name='obj' id='obj'>"+
    "<?php include( $_SERVER['DOCUMENT_ROOT'].'/nutriologo/connect.php'); 
    $resultado = mysqli_query($conexion,'select * from objetivos');   
    while ($valores = mysqli_fetch_array($resultado)) {                                                                     
    echo "<option value='".$valores['idobjetivos']."'>".$valores['objetivo']."</option>";}?></select></div><br><br>"+
    " <div class = 'siguiente'> <button class = 'btnSig' onclick = 'siguiente2()'>Siguiente</button> </div>";

    
        }
    
    function siguiente2(){
        idobjetivos = document.getElementById('obj').value;
        $.post("introForm1.php", function(resultado){
                            $(".intro").html(resultado);
                           });
    }


  </script>
  
</html>
