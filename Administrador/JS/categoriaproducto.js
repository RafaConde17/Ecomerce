
$(document).ready(function() { 

    //---Comandos para tipo de usuario ---//
                    habilitarBotones();

                    $('.Agregardatos').click(function () {
                      var estado = document.getElementById('llenarcombo').value;             
                       var categoria = document.getElementById('txtcategoriaproducto').value;
               
                    
                       $.ajax({
                        url:'../Arv_ajax/Categoria_producto/ajax_Ingresar.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'ingresar',
                        estado: estado, categoria: categoria
                        },
                        success: function(response){
                    
                            if(response !='error'){
                            let resultado = JSON.parse(response);
                          
                            alert(resultado.resultado);
                              
                            if(resultado.resultado=="Registro Ingresado"){      
                              location.reload();
                            }


                            }
        
                        },error: function(error){console.log(error);} 
                    });
                    
                    });
    
                     //mostrar Lista de usuarios en tabla
                     
                     $.ajax({
                        url:'../Arv_ajax/Categoria_producto/ajax_lista.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'lista'},
                        success: function(response){
                    
                            if(response !='error'){
                            let resultado = JSON.parse(response);
                          
                            // vaciar el contenido de la tabla
                            $("#llenarlista_categoriaproducto").empty();
                            // recorrer los resultados y agregarlos a la tabla
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].categoria + "</td>";
                                    fila += "<td>" + resultado[i].estado + "</td>";
                                    fila += "<td> "+
                                            " <button type='button'  class='link_add btn btn-success ver  Verdatos' referencia='"+ resultado[i].id +"'>  <i class='fas fa-eye'> </i> </button>"+
                                            " <button type='button' class='btn btn-danger  borrar Borrardatos' referencia='"+ resultado[i].id  +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlista_categoriaproducto").append(fila);
                                }
                            }
        
                        },error: function(error){console.log(error);} 
                    });
    
                      $("#llenarlista_categoriaproducto").on("click", ".ver", function()
                      {
                        var id = $(this).attr('referencia');
                  
                      // hacer llamada ajax y obtener datos
                      $.ajax({
                        url: '../Arv_ajax/Categoria_producto/ajax_Bus_uno.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'selecionar', id: id},
                        success: function(response){
                            if(response !='error'){
                                let resultado = JSON.parse(response);
                          // asignar valores a input y select
                          $('#txtcategoriaproducto').val(resultado.categoria);
                          $('#txtcategoriaproducto').attr("disabled", true);
                          $('#llenarcombo').val(resultado.estado);
                          $('#txtID').val(id);
                          habilitado = false;
                           habilitarBotones();
                          }
                        }
                      });
                    
                      });
    
                      $("#llenarlista_categoriaproducto").on("click", ".borrar", function()
                      {
                        var id = $(this).attr('referencia');
    
                      // hacer llamada ajax y obtener datos

                      showConfirmationDialog().then((res) => {
                          var respuesta = res;
                          if(respuesta =="yes"){
                          
                              $.ajax({
                                url: '../Arv_ajax/Categoria_producto/ajax_borrar.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {action: 'borrar', id: id},
                                success: function(response){
                                  // borrado y actualizdo
                                  if(response !='error'){
                                   
                                    
                                  
                                   alert(response.resultado);

                                   location.reload();
                                    
                                  }
                                }
                              });
                          }
                      });
                    
            
                      
                     

                     
                    
                      });
                      $('.Cancelardatos').click(function () {
                        habilitado = true;
                        habilitarBotones();
                        location.reload();
                                    
                      });


                      $('.Modificardatos2').click(function () { 
                        
                        var estado = document.getElementById('llenarcombo').value;             
                        var id = document.getElementById('txtID').value;                        
                        
                        
                        $.ajax({
                        url:'../Arv_ajax/Categoria_producto/ajax_Modificar.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'modificar',
                        estado: estado,  id: id
                        },
                        success: function(response){
                    
                            if(response !='error'){
                                let resultado = JSON.parse(response);
                          
                                alert(resultado.resultado);

                                if(resultado.resultado=="Registro Modificado"){ 
                                habilitado = true;
                                habilitarBotones();
                                
                                location.reload();

                                } 
                            }
        
                        },error: function(error){console.log(error);} 
                    });




                       
                                    
                      });
                     
                      
                //--End---//
    
    
    });