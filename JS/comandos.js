 //variable habilitado para podr acceder al estado de disabled de las etiquetas
 let habilitado = true;


// habilitar y deshabilitar botones y campos 

 function habilitarBotones(){
    if(habilitado){
        $('.bloqueocampos').attr("disabled", true);
        $(".Agregardatos").attr("disabled", false);
        $(".Modificardatos").attr("disabled", false);
        $(".Modificardatos2").attr("disabled", true);
        $(".Verdatos").attr("disabled", false);
        $(".Guardardatos").attr("disabled", true);
        $(".Cancelardatos").attr("disabled", true);
        $(".Borrardatos").attr("disabled", false);
    }
    else{
        $('.bloqueocampos').attr("disabled", false);
        $('.Agregardatos').attr("disabled", true);
        $(".Modificardatos").attr("disabled", true);
        $(".Modificardatos2").attr("disabled", false);
        $(".Guardardatos").attr("disabled", false);
        $(".Verdatos").attr("disabled", true);
        $(".Cancelardatos").attr("disabled", false);
        $(".Borrardatos").attr("disabled", true);
    }
}


// cerrar los modal y actualizar
 function coloseModal(){
         $( ".modal" ).fadeOut();
         location.reload();
}

// cerrar los modal 
 function coloseModal_noupdate(){
       $( ".modal" ).fadeOut();
}

// mostrar contraseña con un boton eye
 function mostrarPassword(){
    var cambio = document.getElementById("usuario_con");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 

// confirmacion de borrar item
function showConfirmationDialog() {
    return new Promise((resolve) => {
      if (confirm("¿Deseas borrar el item?")) {
        resolve("yes");
      } else {
        resolve("no");
      }
    });
  }

  function validateImage(imageUrl) {
    var img = new Image();
    img.src = imageUrl;
    return img.height !== 0;
}