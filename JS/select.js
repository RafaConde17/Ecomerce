
$(document).ready(function() {
    
    // mostrar estado en combo 
    $.ajax({
        url: '../../Arv_ajax/Arv_ajax_select/ajax_estado.php',
        type: 'POST',
        async: true,
        data: {action:'buscarestado'},
        success: function(response){
        if(response !='error'){
        let resultado = JSON.parse(response);
        $.each(resultado, function(i, item) {
        $("#llenarcombo").append($('<option>', {
        value: item.id,
        text : item.texto
        }));
        });
        }
        },
        error: function(error){
        console.log(error);
        throw new Error("Ha ocurrido un error al obtener la respuesta AJAX");
        }
        });
    // mostrar categoria_producto en combo 

    $.ajax({
        url:'../../Arv_ajax/Arv_ajax_select/ajax_categoria_producto.php',
        type: 'POST',
        async: true,
        data: {action:'selecionar_combo'},
        success: function(response){

        if(response !='error'){
            let resultado = JSON.parse(response);

            $.each(resultado, function(i, item) {
                $("#categoria_combo").append($('<option>', { 
                    value: item.id,
                    text : item.categoria 
                }));
            });

    }

        },error: function(error){console.log(error);} 
    });

    // mostrar tipo usuario en combo  
            $.ajax({
                url:'../../Arv_ajax/Arv_ajax_select/ajax_tipo_usu.php',
                type: 'POST',
                async: true,
                data: {action: 'selecionartipousu'},
                success: function(response){
    
                if(response !='error'){
                    let resultado = JSON.parse(response);

                    $.each(resultado, function(i, item) {
                        $("#llenarcombo_tipousu").append($('<option >', { 
                            value: item.id,
                            text : item.texto 
                        }));
                    });
            
            }

                },error: function(error){console.log(error);} 
            });

   

});
