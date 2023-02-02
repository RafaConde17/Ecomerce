
$(document).ready(function() { 

                    //---Comandos para tipo de usuario ---//
                    var combo_categoria = "";
                    var combo_estado = "";
                    var imagenruta="../Img/Productos_img/";
                    var imagendefaul="Producto_default.jpg";

                     //mostrar Lista de usuarios en tabla
                     
                     $.ajax({
                        url:'../Arv_ajax/Productos/ajax_lista.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'lista'},
                        success: function(response){
                          
                            if(response !='error'){

                            let resultado = JSON.parse(response);
                          
                            // vaciar el contenido de la tabla
                            $("#llenarlista_categoria").empty();
                            // recorrer los resultados y agregarlos a la tabla
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].usuario + "</td>";
                                    fila += "<td>" + resultado[i].producto + "</td>";
                                    fila += "<td>" + resultado[i].idcategoria + "</td>";
                                    fila += "<td>" + resultado[i].subcategoria + "</td>";
                                    fila += "<td>" + resultado[i].descripcion + "</td>";
                                    fila += "<td>" + resultado[i].cantidad + "</td>";
                                    fila += "<td>" + resultado[i].precio + "</td>";
                                    fila += "<td>"  + "<img src='../../Img/Productos_img/"+resultado[i].imagen+"' width='50' alt='' srcset=''></img>"  + "</td>";
                                    fila += "<td>" + resultado[i].estado + "</td>";
                                    fila += "<td> "+
                                            " <button type='button'  class='link_add btn btn-success ver  Verdatos' referencia='"+ resultado[i].idproducto +"'>  <i class='fas fa-eye'> </i> </button>"+
                                            " <button type='button' class='btn btn-danger  borrar Borrardatos' referencia='"+ resultado[i].idproducto  +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlista_categoria").append(fila);
                                }
                            }
        
                        },error: function(error){console.log(error);} 
                    });


                    $("#llenarlista_categoria").on("click", ".ver", function()
                      {
                        var id = $(this).attr('referencia');
                       
                     
                      // hacer llamada ajax y obtener datos
                      $.ajax({
                        url: '../Arv_ajax/Productos/ajax_Bus_uno.php',
                        type: 'POST',
                        async: true,
                        data: {action: 'seleccionar', id: id},
                        success: function(response){
                          // asignar valores a input y select
                      
                                if(response !='error'){
                                    let resultado = JSON.parse(response);
                                
                                $('#txtproducto').val(resultado.producto);
                          
                                $('#txtsubcategoria').val(resultado.subcategoria);
                                $('#txtdescripcion').val(resultado.descripcion);
                                $('#txtcantidad').val(resultado.cantidad);
                                $('#txtprecio').val(resultado.precio);

                                $('#categoria_combo').val(resultado.idcategoria);
                                $('#llenarcombo').val(resultado.estado);

                                $('#modal_nombre_img').val(resultado.imagen);
                                
                                $('#txtproducto').attr("disabled", true);
                                $('#modal_imagen').attr("src","../"+imagenruta + resultado.imagen);
                                combo_categoria= resultado.idcategoria ;
                                combo_estado=resultado.estado ;

                                $('#txtID').val(id);
                               
                                }
                          
                        }

                      });
                     
                      habilitarBotones();
                      document.getElementById("BotonModificarIngresar").innerHTML = "Modificar"; 
                            
                      $("#modal").fadeIn();
                      });

                      $('.nuevo').click(function(event){
                        event.preventDefault();
                            document.getElementById("BotonModificarIngresar").innerHTML = "Ingresar"; 
                            habilitarBotones();
                            $("#modal").fadeIn();
                    });

                    $('.Modificardatos').click(function () {
                        
                        habilitado = false;
                        habilitarBotones();

                        var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;

                        if(accion=="Ingresar"){
                            $('.producto').attr("disabled", false);
                        }   
                    });


                    $('.Cancelardatos').click(function () {
                        habilitado = true;
                        habilitarBotones();
                    
                        var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;
                        

                        if(accion=="Ingresar"){

                            $('.producto').attr("disabled", true);
                            document.getElementById("llenarcombo").options[0].selected = true;
                            document.getElementById("categoria_combo").options[0].selected = true;
                           

                        } else{

                            $('#categoria_combo').val(combo_categoria);
                            $('#llenarcombo').val(combo_estado);
                        }
                    
                    });

                        $("#llenarlista_categoria").on("click", ".borrar", function()
        
                        {
                            var id = $(this).attr('referencia');

                                $.ajax({
                                    url:'../Arv_ajax/Productos/ajax_borrar.php',
                                    type: 'POST',
                                    async: true,
                                    data: {
                                        action: 'borrar',
                                        id: id
                                    },
                                    success: function(response){

                                        if(response !='error'){
                                        
                                            let respuesta = JSON.parse(response);

                                                        
                                            
                                                                var img = respuesta.imagen;
                                                               


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

                                                                    var imagen = data["imagen"];
                                                                    var resultado = data["resultado"];
                                                                    console.log(resultado +  " : " + imagen);
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

            
                        });


                        $('.Guardardatos').click(function () {


                            var id = document.getElementById('txtID').value;
                            var pro = document.getElementById('txtproducto').value;
                            var cat = document.getElementById('categoria_combo').value;
                            var subcat = document.getElementById('txtsubcategoria').value;
                            var des = document.getElementById('txtdescripcion').value;
                            var cant = document.getElementById('txtcantidad').value;
                            var pre = document.getElementById('txtprecio').value;
                            var est = document.getElementById("llenarcombo").value;

                            var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;
                            var img = "";
                         
                           
                            // Create a new FormData object to hold the image file
                            const formData_guardar = new FormData();
                            
                                        var imagen = document.getElementById("modal_input_img").value;


                                        // Verifica si el campo de imagen está vacío y asigna un valor predeterminado
                                        if(imagen.length > 0){
                                            
                                        
                                                    // create variables para poder obtener los atributos 
                                                    const img_dir = document.getElementById('modal_input_img').files[0];
                                                    const previous_image_name = document.getElementById("modal_nombre_img").value;

                                                
                                                    // Use a timestamp to make the image name unique
                                                    const timestamp = new Date().getTime();

                                                    img = timestamp + '_' + img_dir.name;

                                                    formData_guardar.append("imagen", img_dir);
                                                    formData_guardar.append("image_name", img);
                                                    formData_guardar.append("imagen_anterior", previous_image_name);
                                                    formData_guardar.append("image_ruta",imagenruta);
                                                    formData_guardar.append("image_default",imagendefaul);
                                                    
                                        }else{
                                                if(accion=="Modificar"){    
                                                     img = document.getElementById('modal_nombre_img').value;
                                                }else{
                                                     img = imagendefaul;
                                                }
                                        }

                            if(accion=="Modificar"){
                                    $.ajax({
                                        url:'../Arv_ajax/Productos/ajax_Modificar.php',
                                        type: 'POST',
                                        async: true,
                                        data: {
                                            action: 'modificar',
                                            id: id,
                                            idcategoria: cat ,
                                            subcategoria: subcat ,
                                            descripcion: des,
                                            cantidad: cant,
                                            precio: pre,
                                            imagen: img,
                                            estado: est
                                        },
                                        success: function(response){

                                            if(response !='error'){

                                                let resultado = JSON.parse(response);

                                                alert(resultado.resultado);

                                                    if(resultado.resultado =="Registro Modificado"){
                                                        habilitado = true;
                                                        habilitarBotones();    
                                                        if(imagen.length > 0){

                                                                    fetch('../../Arv_ajax/ajax_reemplazar_img.php', {
                                                                        method: 'POST',
                                                                        body: formData_guardar

                                                                    }).then(response => {
                                                                        return response.json();
                                                                    }).then(data => {
                                                                        var imagen = data["imagen"];
                                                                        var resultado = data["resultado"];
                                                                        console.log(resultado);
                                                                    
                                                                        // Aquí puedes utilizar la variable 'resultado' en tu código
                                                                        document.getElementById("modal_imagen").src = "../"+ imagenruta + imagen;
                                                                        habilitado = true;
                                                                        habilitarBotones();
                                                                        
                                                                    }).catch(error => {
                                                                        console.error(error);
                                                                    });


                                                                

                                                        }
                                                    
                                                    }

                                            
                                            }

                                        },
                                        error: function(error){
                                            console.log(error);
                                        } 
                                    });


                            }else{

                                $.ajax({
                                    url:'../Arv_ajax/Productos/ajax_Ingresar.php',
                                    type: 'POST',
                                    async: true,
                                    data: {
                                        action: 'ingresar',
                                        producto: pro,
                                        idcategoria: cat ,
                                        subcategoria: subcat ,
                                        descripcion: des,
                                        cantidad: cant,
                                        precio: pre,
                                        imagen: img,
                                        estado: est
                                    },
                                    success: function(response){
                                    
                                    
                                        if(response !='error'){

                                            let resultado = JSON.parse(response);

                                            if(resultado.resultado =="Registro Ingresado"){
                                            
                                                alert(resultado.resultado);  

                                                    fetch('../../Arv_ajax/ajax_ingresar_img.php', {
                                                        method: 'POST',
                                                        body: formData_guardar
                                                    }).then(response => {
                                                        // Handle the server response here
                                                        if(response !='error'){

                                                            response.text().then(function (text) {
                                                                console.log(text);


                                                                habilitado = true;
                                                                habilitarBotones();
                                                                coloseModal();
                                                            });

                                                        

                                                        }
                                                    
                                                    }).catch(error => {
                                                        // Handle any errors here
                                                        console.error(error);
                                                    });


                                            
                                            }else{
                                                alert("Error al registrar: " + resultado.resultado);
                                            
                                            }   
                                            
                                        }
                                    },
                                    error: function(error){
                                        console.log(error);
                                    } 
                                });

                            }

                        
                        });
                    
                     
                //--End---//
    
    
    });