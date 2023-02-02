


$(document).ready(function() {

            $.ajax({
                    url:'../Arv_ajax_select/ajax_estado.php',
                    type: 'POST',
                    async: true,
                    data: {action:'buscarestado'},
                    success: function(response){
            
                    console.log(response);
                    
                    if(response !='error'){
                        let resultado = JSON.parse(response);
                        console.log(resultado);
    
                        $.each(resultado, function(i, item) {
                            $("#llenarcombo").append($('<option >', { 
                                value: item.id,
                                text : item.texto 
                            }));
                        });
                 
                }
    
                    },error: function(error){console.log(error);} 
                });

                
                $.ajax({
                    url:'../Arv_ajax_select/ajax_tipo_usu.php',
                    type: 'POST',
                    async: true,
                    data: {action: 'selecionartipousu'},
                    success: function(response){
            
                    console.log(response);
                    
                    if(response !='error'){
                        let resultado = JSON.parse(response);
                        console.log(resultado);
    
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
                
