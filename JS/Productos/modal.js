
$(document).ready(function() { 
    
    
    
    
    $('.nuevo').click(function(event){
    event.preventDefault();
        document.getElementById("BotonModificarIngresar").innerHTML = "Ingresar"; 
        habilitarBotones();
        $("#modal").fadeIn();
    });




});