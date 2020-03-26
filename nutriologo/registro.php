<html>
<header>  <link rel='stylesheet' type='text/css' href='estilos.css'>
    <h1  align = center ><a href = index.php>NutriBot</a></h1>
    <h3>
    <a href = index.php>Iniciar Sesion</a>&nbsp;&nbsp;&nbsp;&nbsp; </h3>
    </header>
        <body>
            <br>
            <br>
            <br>
            <br>
            <form action="registrarBD.php" onsubmit = "return validar()" method = post>
                <table align = center>
                    <tr>
                        <td colspan = 2 align = center><b>Registro</b></td>
                    </tr>
                    <tr>
                       <td></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td> <td><input type="text" id = nombre name = nombre></td>
                    </tr>
                    <tr>
                        <td>Apellidos: </td> <td><input type="text" id = apellidos name = apellidos></td>
                    </tr>
                    <tr>
                        <td>Correo: </td> <td><input type="text" id = correo name = correo></td>
                    </tr>
                    <tr>
                        <td>Contraseña: </td> <td><input type="password" id = pass name = pass></td>
                    </tr>                  
                    <tr>
                    <td align = "center" colspan="2"><button>Registrarse</button></td>
                    </tr>
                </table>
            </form>
    
        </body>
<script>
        function validar()
   {
      var nombre, apellido,correo,pass;
      nombre = document.getElementById('nombre').value;
      apellido = document.getElementById('apellidos').value;
      correo = document.getElementById('correo').value;
      pass = document.getElementById('pass').value;
      var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
if(nombre == "" || apellido == "" || correo == "" || pass == ""){
    alert("No puede dejar ningun campo vacio");
    return false;
}else if(nombre.length > 45 || apellido.length > 45)
     {
      alert("El nombre o el apellido es muy largo");
      return false;

     }else if(pass.length > 45 ){
         alert("la constrasena no puede exceder los 45 caracteres");
         return false;
     }else  if (!expresion.test(correo)){
   alert("El correo no es valido"); return false;
  }else if(pass.length < 8){
  alert("La contraseña debe contener almenos 8 caracteres"); return false;
}

   }
   </script>
</html>