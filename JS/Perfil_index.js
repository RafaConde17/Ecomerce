$(document).ready(function() {
    var idusuario = document.getElementById('idusuario').value;
    $.ajax({
        url:'../Arv_ajax/Perfil/ajax_Bus_uno.php',
        type: 'POST',
        async: true,
        data: {action: 'ver', id: idusuario},
        success: function(response){

        if(response !='error'){
            let resultado = JSON.parse(response);
            // vaciar el contenido de la tabla

      
            document.getElementById("nombre").innerHTML = resultado.Nombres;
            document.getElementById("apellido").innerHTML = resultado.Apellidos;
            $('#txtimagen_cabecera').attr("src","../Img/Usuarios_img/" + resultado.Imagen);
                              
            
        } 

        
  

        },error: function(error){console.log(error);} 
    });






});