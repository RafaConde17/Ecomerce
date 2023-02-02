 $(document).ready(function() {
    
    //toto este apartado son configuraciones para  la seccion Usuario y modal usuario
   

    habilitarBotones();
    var id_general = document.getElementById('txtID').value;
    
    //mostrar Lista de usuarios en tabla
            $.ajax({
                url:'../Arv_ajax/Perfil/ajax_Bus_uno.php',
                type: 'POST',
                async: true,
                data: {action: 'ver' , id: id_general},
                success: function(response){
    
                if(response !='error'){
                    let resultado = JSON.parse(response);
                    // vaciar el contenido de la tabla

                    $('#txtusuario').val(resultado.Usuario);
                    $('#usuario_con').val(resultado.Contraseña);
                    $('#txtnombres').val(resultado.Nombres);
                    $('#txtapellidos').val(resultado.Apellidos);
                    $('#txtemail').val(resultado.Correo);
                    $('#txtcelular').val(resultado.Numero);
                    $('#txtimagen_name').val(resultado.Imagen);
                    document.getElementById("txtimagen_img").src = "../Img/Usuarios_img/" + resultado.Imagen;
                                                         
              
                }

                },error: function(error){console.log(error);} 
            });

            
            
            $('.Modificardatos').click(function () {
            
                habilitado = false;
                habilitarBotones();
            });
            
            $('.Guardardatos').click(function () {

                var id = id_general;
                var con = document.getElementById('usuario_con').value;
                var nom = document.getElementById('txtnombres').value;
                var ape = document.getElementById('txtapellidos').value;
                var cor = document.getElementById('txtemail').value;
                var num = document.getElementById('txtcelular').value;

                var img = "";
                var imagenruta="../Img/Usuarios_img/";
                var imagendefaul_usu="User_default.png";
                // Create a new FormData object to hold the image file
                const formData_guardar = new FormData();
                
                            var imagen = document.getElementById("txtimagen_input").value;


                            // Verifica si el campo de imagen está vacío y asigna un valor predeterminado
                            if(imagen.length > 0){
                                
                            
                                        // create variables para poder obtener los atributos 
                                        const img_dir = document.getElementById('txtimagen_input').files[0];
                                        const previous_image_name = document.getElementById("txtimagen_name").value;

                                    
                                        // Use a timestamp to make the image name unique
                                        const timestamp = new Date().getTime();
                                        img = timestamp + '_' + img_dir.name;

                                        formData_guardar.append("imagen", img_dir);
                                        formData_guardar.append("image_name", img);
                                        formData_guardar.append("imagen_anterior", previous_image_name);
                                        formData_guardar.append("image_ruta",imagenruta);
                                        formData_guardar.append("image_default",imagendefaul_usu);
                                        
                            }else{
                                  
                                        var img = document.getElementById('txtimagen_name').value;
                                   
                            }

                
                        $.ajax({
                            url:'../Arv_ajax/Perfil/ajax_Modificar.php',
                            type: 'POST',
                            async: true,
                            data: {
                                action: 'modificarusuario',
                                idusuario: id,
                                Contrasenia : con,
                                Nombres : nom,
                                Apellidos : ape,
                                Correo : cor,
                                Numero : num,
                                Imagen : img
                            },
                            success: function(response){
                               
                                if(response !='error'){

                                    let resultado = JSON.parse(response);
                              
                              
                                    alert(resultado.resultado);


                                        if(resultado.resultado =="Registro Modificado"){

                                            habilitado = true;
                                            habilitarBotones();    
                                            if(imagen.length > 0){

                                                        fetch('../Arv_ajax/ajax_reemplazar_img.php', {
                                                            method: 'POST',
                                                            body: formData_guardar

                                                        }).then(response => {
                                                            return response.json();
                                                        }).then(data => {

                                                            var resultado = data["resultado"];
                                                            console.log(resultado);
                                                        
                                                            // Aquí puedes utilizar la variable 'resultado' en tu código
                                                            document.getElementById("txtimagen_img").src = "../../Img/Usuarios_img/" + imagen;
                                                            habilitado = true;
                                                            habilitarBotones();

                                                        }).catch(error => {
                                                            console.error(error);
                                                        });

                                                        }
                                        
                                        }
                                        
                                        location.reload();       
                                
                                }

                            },
                            error: function(error){
                                console.log(error);
                            } 
                        });


              

            
            });

            $('.Cancelardatos').click(function () {
                location.reload();
            });

            $('#ShowPassword').click(function () {
                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
            });
    //--End---//

});

