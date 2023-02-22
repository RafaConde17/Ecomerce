
$(document).ready(function() { 

    //---Comandos para tipo de usuario ---//
     //mostrar Lista de usuarios en tabla
  
    $("#llenarlista").on("click", ".ver_productos", function()
      {
        var id = $(this).attr('referencia');
       
     
      // hacer llamada ajax y obtener datos
      $.ajax({
        url: '../../Arv_ajax/Pedidos/ajax_Bus_uno_pro.php',
        type: 'POST',
        async: true,
        data: {action: 'ver', id: id},
        success: function(response){
          // asignar valores a input y select
      
                if(response !='error'){
                    let resultado = JSON.parse(response);
  
                    $("#llenarlista_modaldatos").empty();
                    // recorrer los resultados y agregarlos a la tabla
                    for(let i = 0; i < resultado.length; i++) {
                      let fila = "<tr>";
                      fila += "<td>" + resultado[i].valor + "</td>";
  
  
                      fila += "<td>" + "<img src='../../Img/Productos_img/" +  resultado[i].imagen +
                      "' onerror='this.onerror=null; this.src= \"../../Img/Medio_Envio/"+ resultado[i].imagen +
                      "\";' width='50' alt='' srcset=''></img>" +"</td>";
  
                  
  
                      fila += "<td>" + resultado[i].articulos + "</td>";
                      fila += "<td>" + resultado[i].cantidad + "</td>";
                      fila += "<td>" + resultado[i].precio + "</td>";
                      fila += "<td>" + resultado[i].total + "</td>";
                      
                      fila += "</tr>";
  
      
                      $("#llenarlista_modaldatos").append(fila);
                  }
  
                  
  
                }
                  
        }
  
      });
  
            
      $("#modal_productos").fadeIn();
      });
  
      $("#llenarlista").on("click", ".ver_cliente", function()
      {
        var id = $(this).attr('referencia');
       
     
      // hacer llamada ajax y obtener datos
      $.ajax({
        url: '../../Arv_ajax/Pedidos/ajax_Bus_uno_datos.php',
        type: 'POST',
        async: true,
        data: {action: 'ver', id: id},
        success: function(response){
          // asignar valores a input y select
                if(response !='error'){
                    let resultado = JSON.parse(response);
  
                    $('#txtnombre').val(resultado.nombre);
                    $('#txtapellidos').val(resultado.apellidos);
                    $('#txttelefono').val(resultado.telefono);
                    $('#txtdireccion').val(resultado.direccion);
                    
                       
                }
          
        }
  
      });
     
            
      $("#modal_cliente").fadeIn();
      });
    
      $("#llenarlista").on("click", ".borrar", function()
      {
        var id = $(this).attr('referencia');
  
      // hacer llamada ajax y obtener datos
  
      showConfirmationDialog().then((res) => {
          var respuesta = res;
          if(respuesta =="yes"){
          
              $.ajax({
                url: '../Arv_ajax/Pedidos/ajax_cancelarpedido.php',
                type: 'POST',
                async: true,
                data: {action: 'borrar', id: id},
                success: function(response){
                  // borrado y actualizdo
                  if(response !='error'){
                    let resultado = JSON.parse(response);
                      alert(resultado.resultado);
  
                      location.reload();
                    
                  }
                }
              });
          }
      });
    
  
     
     
    
      });
     



      });
     