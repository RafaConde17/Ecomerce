
$(document).ready(function() { 

    //---Comandos para tipo de usuario ---//
                    habilitarBotones();

                    var imagenruta="../Img/Medio_Envio/";
                    var imagendefaul="EnviorDefault.jpg";
                    var idusuario = id_userlogin;
                     //mostrar Lista de usuarios en tabla
                     


                     $.ajax({
                        url:'../Arv_ajax/Medio_Envio/ajax_lista.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'lista', id:idusuario},
                        success: function(response){
                          
                            if(response !='error'){
                            let resultado = JSON.parse(response);
                          
                            // vaciar el contenido de la tabla
                            $("#llenarlista").empty();
                            // recorrer los resultados y agregarlos a la tabla
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].medioenvio + "</td>";
                                    fila += "<td>"  + "<img src='../"+ imagenruta +resultado[i].imagen_m_envio+"' width='50' alt='' srcset=''></img>"  + "</td>";
                                    fila += "<td>" + resultado[i].descripcion_m_envio + "</td>";
                                    fila += "<td>" + resultado[i].precio_m_envio + "</td>";
                                    fila += "<td>" + resultado[i].detalleestado + "</td>";
                                    fila += "<td> "+
                                            " <button type='button'  class='link_add btn btn-success ver  Verdatos' referencia='"+ resultado[i].idmedioenvio +"'>  <i class='fas fa-eye'> </i> </button>"+
                                            " <button type='button' class='btn btn-danger  borrar Borrardatos' referencia='"+ resultado[i].idmedioenvio  +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlista").append(fila);
                                }
                            }
        
                        },error: function(error){console.log(error);} 
                    });

                    $("#llenarlista").on("click", ".ver", function()
                      {
                        var id = $(this).attr('referencia');
                       
                      // hacer llamada ajax y obtener datos
                      $.ajax({
                        url: '../Arv_ajax/Medio_Envio/ajax_Bus_uno.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'seleccionar', id: id},
                        success: function(response){
                          // asignar valores a input y select

                                if(response !='error'){
                                    let resultado = JSON.parse(response);
                                
                                $('#txtmedioenvio').val(resultado.medioenvio);
                                $('#txtImagen_name').val(resultado.imagen_m_envio);
                                $('#txtdescripcion').val(resultado.descripcion_m_envio);
                                $('#txtprecio').val(resultado.precio_m_envio);
                                $('#llenarcombo').val(resultado.estado);
                                $('#txtmedioenvio').attr("disabled", true);
                                $('#txtImagen_imagen').attr("src","../" + imagenruta + resultado.imagen_m_envio);
                            
                                
                                $('#txtID').val(id);
                                habilitado = false;
                                habilitarBotones();
                                }
                        }

                      });
                    
                      });
                      $("#llenarlista").on("click", ".borrar", function()
               
                        {
                            var id = $(this).attr('referencia');

                            
                            console.log(id);
                             // hacer llamada ajax y obtener datos

                             showConfirmationDialog().then((res) => {
                                var respuesta = res;
                                
                                if(respuesta =="yes"){
                                
                                    $.ajax({
                                        url: '../Arv_ajax/Medio_Envio/ajax_borrar.php',
                                        type: 'POST',
                                        async: true,
                                        data: {action: 'borrar', id: id},
                                        success: function(response){
                    
                                            if(response !='error'){
                                                let resultado = JSON.parse(response);
                                          
                                                alert(resultado.resultado);
                          
                                                                        var img = resultado.imagen;
                                                 
                                                                        const formData_eliminar = new FormData();
        
                                                                        formData_eliminar.append("image_name", img);
                                                                        formData_eliminar.append("image_ruta",imagenruta);
                                                                        formData_eliminar.append("image_default",imagendefaul);
        
                                                                        fetch('../../Arv_ajax/ajax_borrar_img.php', {
                                                                            method: 'POST',
                                                                            body: formData_eliminar
        
                                                                        }).then(response => {
                                                                            return response.json();
                                                                        }).then(data => {
                                                                            var resultado = data["resultado"];
                                                                            console.log(resultado);
                                                                            location.reload();
                                                                            
                                                                        }).catch(error => {
                                                                            console.error(error);
                                                                        });
                                                    }
                                            },
                                            error: function(error){
                                                console.log(error);
                                            } 
                                        });

                                       // location.reload();
                                            
                                }
                            });

                            
                        });
                     
                    
                   


                      $('.Cancelardatos').click(function () {
                        habilitado = true;
                        habilitarBotones();
                        location.reload();
                                    
                      });

                      $('.Agregardatos').click(function () {
                         var medioenvio = document.getElementById('txtmedioenvio').value;             
                         var imagen_m_envio = document.getElementById('txtImagen_name').value;
                         var descripcion_m_envio = document.getElementById('txtdescripcion').value;             
                         var precio_m_envio = document.getElementById('txtprecio').value;
                         var estado = document.getElementById('llenarcombo').value;
                         
                         var imagen_m_envio = "";
                    
                         const formData_ingresar = new FormData();
                         
                         var imagen = document.getElementById("txtImagen").value;
 
                                          if(imagen.length > 0){
                                             
                                         
                                                     // create variables para poder obtener los atributos 
                                                     const img_dir = document.getElementById('txtImagen').files[0];
                                                     const previous_image_name = document.getElementById("txtImagen_name").value;
 
                                                 
                                                     // Use a timestamp to make the image name unique
                                                     const timestamp = new Date().getTime();
                                                     imagen_m_envio = timestamp + '_' + img_dir.name;
 
                                                     formData_ingresar.append("imagen", img_dir);
                                                     formData_ingresar.append("image_name", imagen_m_envio);
                                                     formData_ingresar.append("imagen_anterior", previous_image_name);
                                                     formData_ingresar.append("image_ruta", imagenruta);
                                                     formData_ingresar.append("image_default", imagendefaul);
                                                     
                                         }else{
                                             
                                                      imagen_m_envio ="EnviorDefault.jpg";
                                                
                                         }
 
 
 
 


                         $.ajax({
                          url:'../Arv_ajax/Medio_Envio/ajax_Ingresar.php',
                          type: 'POST',
                          async: true,
                          data: {action: 'ingresar',
                          medioenvio: medioenvio,
                          idusuario: idusuario,
                          imagen_m_envio: imagen_m_envio,
                          descripcion_m_envio: descripcion_m_envio,
                          precio_m_envio: precio_m_envio,
                          estado: estado

                          },
                          success: function(response){
                      
                              if(response !='error'){
                              let resultado = JSON.parse(response);
                            
                              alert(resultado.resultado);
                              if(resultado.resultado=="Registro Ingresado"){      
                              
                                fetch('../../Arv_ajax/ajax_ingresar_img.php', {
                                    method: 'POST',
                                    body: formData_ingresar
                                }).then(response => {
                                    // Handle the server response here
                                    if(response !='error'){

                                        response.text().then(function (text) {

                                            habilitado = true;
                                            habilitarBotones();
                                        });
                                    }
                                
                                }).catch(error => {
                                    // Handle any errors here
                                    console.error(error);
                                });
                              
                              
                              
                              
                              
                                location.reload();
                              }
  
  
                              }
          
                          },error: function(error){console.log(error);} 
                      });
                      
                      });



                      
                      $('.Modificardatos2').click(function () { 
                        
           

                        var descripcion_m_envio = document.getElementById('txtdescripcion').value;             
                        var precio_m_envio = document.getElementById('txtprecio').value;
                        var estado = document.getElementById('llenarcombo').value;
                        var id = document.getElementById('txtID').value;       

                        var imagen_m_envio = "";

                        const formData_modificar = new FormData();
                        
                        var imagen = document.getElementById("txtImagen").value;

                                         if(imagen.length > 0){
                                            
                                        
                                                    // create variables para poder obtener los atributos 
                                                    const img_dir = document.getElementById('txtImagen').files[0];
                                                    const previous_image_name = document.getElementById("txtImagen_name").value;

                                                
                                                    // Use a timestamp to make the image name unique
                                                    const timestamp = new Date().getTime();
                                                    imagen_m_envio = timestamp + '_' + img_dir.name;

                                                    formData_modificar.append("imagen", img_dir);
                                                    formData_modificar.append("image_name", imagen_m_envio);
                                                    formData_modificar.append("imagen_anterior", previous_image_name);
                                                    formData_modificar.append("image_ruta",imagenruta);
                                                    formData_modificar.append("image_default",imagendefaul);
                                                    
                                        }else{
                                            
                                                     imagen_m_envio = document.getElementById('txtImagen_name').value;
                                               
                                        }




                        $.ajax({
                        url:'../Arv_ajax/Medio_Envio/ajax_Modificar.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'modificar',
                          id: id,
                          imagen_m_envio: imagen_m_envio,
                          descripcion_m_envio: descripcion_m_envio,
                          precio_m_envio: precio_m_envio,
                          estado: estado
                        },
                        success: function(response){
                    
                            if(response !='error'){
                                let resultado = JSON.parse(response);
                          
                                alert(resultado.resultado);

                                if(resultado.resultado=="Registro Modificado"){ 
                               
                                            if(imagen.length > 0){

                                                fetch('../../Arv_ajax/ajax_reemplazar_img.php', {
                                                    method: 'POST',
                                                    body: formData_modificar

                                                }).then(response => {
                                                    return response.json();
                                                }).then(data => {
                                                
                                                    // Aquí puedes utilizar la variable 'resultado' en tu código

                                                    
                                                }).catch(error => {
                                                    console.error(error);
                                                });

                                            }
                               
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