$(document).ready(function() { 

    var logeado = "";

    $(".botoningresar").click(function() {
      
      var txtusuario = document.getElementById('txtusuario').value;
      var txtcontrasenia = document.getElementById('txtcontrasenia').value;

      $.ajax({
        url: 'Arv_ajax/ajax_login.php',
        type: 'POST',
        async: true,
        data: { action: 'login', txtusuario: txtusuario, txtcontrasenia: txtcontrasenia},
        success: function(response) {
          if (response != 'error') {

           
            let resultado = JSON.parse(response);


            if(resultado.resultado =="Login Confirmado"){

                  alert(resultado.resultado);

                  logeado = resultado.tipousuario;

                  var Usuario = resultado.id;

                      if(logeado=="1"){
                        var form = document.createElement('form');
                        form.method = "post";
                        form.action = "../Administrador/Perfil.php";
                        
                        var inputUsuario = document.createElement("input");
                        inputUsuario.type = "hidden";
                        inputUsuario.name = "id";
                        inputUsuario.value = Usuario;
                        
                        var inputTipoUsuario = document.createElement("input");
                        inputTipoUsuario.type = "hidden";
                        inputTipoUsuario.name = "tipousuario";
                        inputTipoUsuario.value = logeado;
                        
                        form.appendChild(inputUsuario);
                        form.appendChild(inputTipoUsuario);
                        
                        document.body.appendChild(form);
                        form.submit();
                        
                        } else if (logeado =="2"){
                          var form = document.createElement('form');
                            form.method = "post";
                            form.action = "../Afiliado/Perfil.php";

                            var inputUsuario = document.createElement("input");
                            inputUsuario.type = "hidden";
                            inputUsuario.name = "id";
                            inputUsuario.value = Usuario;

                            var inputTipoUsuario = document.createElement("input");
                            inputTipoUsuario.type = "hidden";
                            inputTipoUsuario.name = "tipousuario";
                            inputTipoUsuario.value = logeado;

                            form.appendChild(inputUsuario);
                            form.appendChild(inputTipoUsuario);

                            document.body.appendChild(form);
                            form.submit();

                        } else if(logeado =="3"){
                          var form = document.createElement('form');
                          form.method = "post";
                          form.action = "../Cliente/Perfil.php";

                          var inputUsuario = document.createElement("input");
                          inputUsuario.type = "hidden";
                          inputUsuario.name = "id";
                          inputUsuario.value = Usuario;

                          var inputTipoUsuario = document.createElement("input");
                          inputTipoUsuario.type = "hidden";
                          inputTipoUsuario.name = "tipousuario";
                          inputTipoUsuario.value = logeado;

                          form.appendChild(inputUsuario);
                          form.appendChild(inputTipoUsuario);

                          document.body.appendChild(form);
                          form.submit();
                        }
            }else{
              alert(resultado.resultado);

            }

          }
        },
        error: function(error) {console.log(error);} 
      });

    });
  });
  