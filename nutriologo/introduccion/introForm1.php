<div class = titulo1>Introduce tus datos</div> <br>
  <div class = texto> Para que poder conocer la cantidad de energía diaria necesitas, debemos de conocerte físicamente. <br>
Por favor introduce tus datos correctamente</div>
<br>
<form action="guardarBD.php" method = post>
<table align = center>
    <tr>
        <td><b>Género:</b></td><td><Input type = radio name = hombre id = hombre onclick = rHombre()>Hombre </Input>
        <input type=radio name = mujer id = mujer onclick = rMujer()>Mujer</td><td><b>Edad:</b></td><td><input type="text" name = edad id = edad size = 3 maxlength = 3 onkeypress='return validaEdad(event)'>Años</td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><b>Peso: </b></td><td><input type="text" maxlength = 6 size = 6 name = peso id = peso onkeypress='return ValidarDecimal(event)'>Kg</td> <td><b>Altura: </b></td><td><input type="text" size = 6 id = altura name = altura onkeypress='return validarNumero(event)'>cm</td>
    </tr>

</table>
</form>
<table class = introBotones>
    <tr>
        <td><div class = 'siguiente2'> <button class = 'btnSig' onclick = 'siguiente1()'><< Anterior</button> </div></td>
        <td><div class = 'siguiente2'> <button class = 'btnSig' onclick = 'return validarFm1()'>Siguiente >></button> </div></td>
    </tr>
</table>
<script>
    function rMujer(){
        if(document.getElementById('hombre').checked)
            document.getElementById('hombre').checked = false;
        
    }
    function rHombre(){
        if(document.getElementById('mujer').checked)
        document.getElementById('mujer').checked = false;
    }
    function validaEdad(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
    }
    function ValidarDecimal(event){
        if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }else if(event.charCode == 46) return true;

     return false;
    }
    function validarNumero(event){
        if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }else return false;
     
    }
    var mujer = document.getElementById('mujer');
       var hombre = document.getElementById('hombre');
       var edad = document.getElementById('edad').value;
      var peso = document.getElementById('peso').value;
       var altura = document.getElementById('altura').value;
    function validarFm1(){
         mujer = document.getElementById('mujer');
         hombre = document.getElementById('hombre');
         edad = document.getElementById('edad').value;
         peso = document.getElementById('peso').value;
         altura = document.getElementById('altura').value;
      
       if(edad == "" || peso == "" || altura == ""){
            alert('No puede dejar campos vacios. Por favor conteste todo lo que se le pide');
            return false;
        }
       
        if(!mujer.checked && !hombre.checked){
            alert('Debe de seleccionar un género');
            return false;
        }
       
        
       var puntos = 0;

       for(var i = 0; i<peso.length; i++){
           if(peso[i].charCodeAt(0) == 46){
               puntos++;
           }
       }
       
       if(puntos > 1){
           alert('Error de sintaxis, el peso tiene más de un punto decimal.');
           return false;
       }
       puntos = 0;
       for(var i = 0; i<altura.length; i++){
           if(altura[i].charCodeAt(0) == 46){
               puntos++;
           }
       }
       if(puntos > 1){
           alert('Error de sintaxis, La altura tiene más de un punto decimal.');
           return false;
       }
       if(mujer) var genero = "m";
       else var genero = "h";
        $.post("guardarFm1BD.php",{"obj":idobjetivos,"genero":genero,"edad":edad,"peso":peso,"altura":altura} ,function(resultado){
                            $(".intro").html('Asi nomas quedo!');
                           });
    }
</script>


