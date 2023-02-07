

$(document).ready(function() {

    //Listar los productos
 
    var variableGlobal = localStorage.getItem("variableGlobal");

    $.ajax({
      url:'../Arv_ajax/Medio_envio/ajax_listaAfiliado.php',
      type: 'POST',
      async: true,
      data: {action: 'lista' , id: variableGlobal},
      success: function(response){
    
          if(response !='error'){
    
          let resultado = JSON.parse(response);
    
          // vaciar el contenido de la tabla
          $("#llenarlista_medio").empty();
          // recorrer los resultados y agregarlos a la tabla
          let contador = 0;
          let fila = "<div class='row'>";
          for(let i = 0; i < resultado.length; i++){
            contador ++;
            fila += "<div class='col-md-4' style='margin-top: 10px'>";
            fila +="<div class='card'>";
    
            fila +="<div class='card-header' style='font-size: 25px; font-weight: bold;'>";
            fila += resultado[i].medioenvio;
            fila += "</div>";
            fila += "</br>";
            fila += "<img class='card-img-top' src='../Img/Medio_Envio/"+ resultado[i].imagen_m_envio  +"' alt='Imagen'>";
    
            fila +="<div class='card-body'>";
    
            fila += " <div style='font-size: 15px; font-weight: bold;'> ";
            fila += " <p style='float: left; margin-right: 10px;'> Precio: S/."+ resultado[i].precio_m_envio  +"</p> ";
            fila += " <p style='float: left;'> Descripción: "+ resultado[i].descripcion_m_envio  +"</p> ";
            fila += " <div style='clear: both;'></div> ";
            fila += " </div> ";
    
            fila += " <a  class='link_add btn btn-warning add_producto '  referencia='"+ resultado[i].idmedioenvio +"'  >Add<i class='fas fa-shopping-cart'></i></a> ";
           
            fila += "</div>";
    
            fila +="<div class='card-footer'>";
    
            fila += "</div>";
    
    
    
    
            fila += "</div>"; 
            fila += "</div>"; 
    
            if(contador % 3 == 0){
              fila += "</div><div class='row'>";
            }
          }
          fila += "</div>";
          $("#llenarlista_medio").append(fila);
          }
    
      },error: function(error){console.log(error);} 
    });
    



  
  
      $("#llenarlista_medio").on("click", ".add_producto", function()
      {
        var id= $(this).attr('referencia'); 

       //Micard.push({idproducto: id});

       // var Micard = id;
       // alert(JSON.parse(localStorage.getItem("variableGlobal_carrito")));
         // var variable = (localStorage.getItem("variableGlobal_carrito"));

         var cant = 1;
         var medioenvio = 1;

         var prec = 0;
         var prod ="";
         var img ="";

        $.ajax({  url:'../Arv_ajax/Medio_envio/ajax_buscar_uno.php',
               type: 'POST',
               async: true,
               data: {action: "ver", id:id},
              success: function(response){
                if(response !='error'){
                 
                var info = JSON.parse(response);

                prod = info.medioenvio;
                prec = info.precio_m_envio;
                img = info.imagen_m_envio;
                
                var form = document.createElement('form');
                form.method = "POST";
                form.action = "Medio_Envio.php";
                
                var dato1 = document.createElement("input");
                dato1.type = "hidden";
                dato1.name = "id_carrito";
                dato1.value = id;
        
                var dato2 = document.createElement("input");
                dato2.type = "hidden";
                dato2.name = "cantidad_carrito";
                dato2.value = cant;
        
                var dato3 = document.createElement("input");
                dato3.type = "hidden";
                dato3.name = "producto_carrito";
                dato3.value = prod;
        
                var dato4 = document.createElement("input");
                dato4.type = "hidden";
                dato4.name = "precio_carrito";
                dato4.value = prec;
        
                var dato5 = document.createElement("input");
                dato5.type = "hidden";
                dato5.name = "imagen_carrito";
                dato5.value = img;
        
                var dato6 = document.createElement("input");
                dato6.type = "hidden";
                dato6.name = "mediopago_carrito";
                dato6.value = medioenvio;
                
                form.appendChild(dato1);
                form.appendChild(dato2);
                form.appendChild(dato3);
                form.appendChild(dato4);
                form.appendChild(dato5);
                form.appendChild(dato6);
        
               // form.appendChild(inputTipoUsuario);
               document.body.appendChild(form);
               form.submit();
                }
              
              },error: function(error){console.log(error);} 
        });
       


        


      });


     
  });