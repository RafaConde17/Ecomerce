
$(document).ready(function() {
                var combo_categoria = "";
                var combo_estado = "";    
                        $.ajax({
                            url:'../Arv_ajax/Usuario/ajax_lista.php',
                            type: 'POST',
                            async: true,
                            data: {action: 'verlistausuario'},
                            success: function(response){
                            if(response !='error'){
                                let resultado = JSON.parse(response);
                                $("#llenarlistaususario").empty();
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].Usuario + "</td>";
                                    fila += "<td>" + resultado[i].tipousuario + "</td>";
                                    fila += "<td>" + resultado[i].Nombres + "</td>";
                                    fila += "<td>" + resultado[i].Apellidos + "</td>";
                                    fila += "<td>" +  "<img src='../../Img/Usuarios_img/"+resultado[i].imagen+"' width='50' alt='' srcset=''></img>"  + "</td>";
                                    fila += "<td>" + resultado[i].Estado + "</td>";
                                    fila += "<td> "+
                                            " <a  class='link_add btn btn-success ver_usuario ' referencia='"+ resultado[i].idusuario +"'> <i class='fas fa-eye'></i> </a>"+
                                            " <button type='button' class='btn btn-danger  borrarusuario' referencia='"+ resultado[i].idusuario +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlistaususario").append(fila);
                                }
                        
                        }
            
                            },error: function(error){console.log(error);} 
                        });

                        $("#llenarlistaususario").on("click", ".ver_usuario", function(){
                    
                            var referencia = $(this).attr('referencia');
                            
                                $.ajax({  url:'../Arv_ajax/Usuario/ajax_Bus_uno.php',
                                type: 'POST',
                                async: true,
                                data: {action:'verusuario',referencia:referencia},
                                success: function(response){
                                
                                if(response !='error'){
                                    var info = JSON.parse(response);
                                    $('#usuario_id').val(info.idusuario);
                                    $('#usuario_usu').val(info.Usuario);
                                    $('#usuario_con').val(info.Contraseña);
                            
                                    $('#usuario_nom').val(info.Nombres);
                                    $('#usuario_ape').val(info.Apellidos);
                                    $('#usuario_cor').val(info.Correo);
                                    $('#usuario_num').val(info.Numero);

                                    combo_categoria= info.idtipousuario ;
                                    combo_estado=info.Estado ;

                                $('.usuario_img').attr("src","../../Img/Usuarios_img/" + info.imagen);
                                $('#usuario_nom_img').val(info.imagen);
                                
                                $('#llenarcombo_tipousu').val(info.idtipousuario);
                                $('#llenarcombo').val(info.Estado);
                                
                                
                            
                                }
                                
                                }
                                ,error: function(error){console.log(error);} });

                                document.getElementById("BotonModificarIngresar").innerHTML = "Modificar"; 
                                habilitarBotones();
                                $("#modalusuarioadmin").fadeIn();
                        });
                    
                        $('.nuevousuario').click(function(event){
                            event.preventDefault();
                                document.getElementById("BotonModificarIngresar").innerHTML = "Ingresar"; 
                                habilitarBotones();
                                $("#modalusuarioadmin").fadeIn();
                        });

                        $("#llenarlistaususario").on("click", ".borrarusuario", function()
        
                        {
                            var id = $(this).attr('referencia');

                                $.ajax({
                                    url:'../Arv_ajax/Usuario/ajax_borrar.php',
                                    type: 'POST',
                                    async: true,
                                    data: {
                                        action: 'borrarusuario',
                                        idusuario: id
                                    },
                                    success: function(response){

                                        if(response !='error'){
                                        
                                            let respuesta = JSON.parse(response);

                                                        
                                            
                                                                var img = respuesta.imagen;
                                                                var imagenruta="../Img/Usuarios_img/";
                                                                var imagendefaul_usu="User_default.png";

                                                                const formData_eliminar = new FormData();

                                                                formData_eliminar.append("image_name", img);
                                                                formData_eliminar.append("image_ruta",imagenruta);
                                                                formData_eliminar.append("image_default",imagendefaul_usu);

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

                        $('.Modificardatos').click(function () {
                        
                            habilitado = false;
                            habilitarBotones();

                            var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;
                            

                            if(accion=="Ingresar"){
                                $('.usuario_usu').attr("disabled", false);
                            }   
                        });
                        
                        $('.Guardardatos').click(function () {

                            var id = document.getElementById('usuario_id').value;
                            var usu = document.getElementById('usuario_usu').value;
                            var con = document.getElementById('usuario_con').value;
                            var tipo = document.getElementById('llenarcombo_tipousu').value;
                            var nom = document.getElementById('usuario_nom').value;
                            var ape = document.getElementById('usuario_ape').value;
                            var cor = document.getElementById('usuario_cor').value;
                            var num = document.getElementById('usuario_num').value;
                            var est = document.getElementById("llenarcombo").value;

                            var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;
                            var img = "";
                            var imagenruta="../Img/Usuarios_img/";
                            var imagendefaul_usu="User_default.png";
                            const formData_guardar = new FormData();
                            
                                        var imagen = document.getElementById("usuario_img").value;


                                        if(imagen.length > 0){
                                            
                                        
                                                    const img_dir = document.getElementById('usuario_img').files[0];
                                                    const previous_image_name = document.getElementById("usuario_nom_img").value;
                                                
                                                    const timestamp = new Date().getTime();
                                                    img = timestamp + '_' + img_dir.name;

                                                    formData_guardar.append("imagen", img_dir);
                                                    formData_guardar.append("image_name", img);
                                                    formData_guardar.append("imagen_anterior", previous_image_name);
                                                    formData_guardar.append("image_ruta",imagenruta);
                                                    formData_guardar.append("image_default",imagendefaul_usu);
                                                    
                                        }else{
                                                if(accion=="Modificar"){    
                                                    var img = document.getElementById('usuario_nom_img').value;
                                                }else{
                                                    var img = "User_default.png";
                                                }
                                        }

                            if(accion=="Modificar"){
                                    $.ajax({
                                        url:'../Arv_ajax/Usuario/ajax_Modificar.php',
                                        type: 'POST',
                                        async: true,
                                        data: {
                                            action: 'modificarusuario',
                                            idusuario: id,
                                            Usuario : usu,
                                            Contrasenia : con,
                                            idtipousuario : tipo,
                                            Nombres : nom,
                                            Apellidos : ape,
                                            Correo : cor,
                                            Numero : num,
                                            Imagen : img,
                                            Estado: est
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
                                                                    
                                                                        document.getElementById("modal_imagen").src = "../../Img/Usuarios_img/" + imagen;
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
                                    url:'../Arv_ajax/Usuario/ajax_Ingresar.php',
                                    type: 'POST',
                                    async: true,
                                    data: {
                                        action: 'ingresarusuario',
                                        Usuario : usu,
                                        Contrasenia : con,
                                        idtipousuario : tipo,
                                        Nombres : nom,
                                        Apellidos : ape,
                                        Correo : cor,
                                        Numero : num,
                                        Imagen : img,
                                        Estado: est
                                    },
                                    success: function(response){
                                    
                                    
                                        if(response !='error'){

                                            let resultado = JSON.parse(response);

                                            if(resultado.resultado =="Ingresado"){
                                            
                                                                                            
                                                    fetch('../../Arv_ajax/ajax_ingresar_img.php', {
                                                        method: 'POST',
                                                        body: formData_guardar
                                                    }).then(response => {
                                                        if(response !='error'){

                                                            response.text().then(function (text) {
                                                                console.log(text);

                                                                habilitado = true;
                                                                habilitarBotones();
                                                                coloseModal();
                                                            });

                                                        

                                                        }
                                                    
                                                    }).catch(error => {
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

                        $('.Cancelardatos').click(function () {
                            habilitado = true;
                            habilitarBotones();
                        
                            var accion =  document.getElementById("BotonModificarIngresar").innerHTML ;
                            

                            if(accion=="Ingresar"){
                                $('.usuario_usu').attr("disabled", true);
                                document.getElementById("llenarcombo").options[0].selected = true;
                                document.getElementById("llenarcombo_tipousu").options[0].selected = true;
                               
    
                            } else{
    
                                $('#llenarcombo_tipousu').val(combo_categoria);
                                $('#llenarcombo').val(combo_estado);
                            }
                        
                        
                        });

                        $('#ShowPassword').click(function () {
                            $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
                        });
                //--End---//

});

