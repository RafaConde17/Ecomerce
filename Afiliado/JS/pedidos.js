
$(document).ready(function() { 

    //---Comandos para tipo de usuario ---//
     //mostrar Lista de usuarios en tabla
        var combo_itemselect ="Referencia";
       
        llenarlista();
        $('#combo').change(function(){
          combo_itemselect = this.value;
       
          if (combo_itemselect === "Cliente") {
            
            $('#txtbuscar1').attr('type', 'text');
            $('#txtbuscar1').attr('placeholder', 'Buscar Cliente');
            $('#txtbuscar2').attr('type', 'hidden');
            $('#txtbuscar1').val("");
            $('#txtbuscar2').val("");
            llenarlista();
          } else if (combo_itemselect === "Referencia") {
        
            $('#txtbuscar1').attr('type', 'text');
            $('#txtbuscar1').attr('placeholder', 'Buscar Referencia');
  
            $('#txtbuscar2').attr('type', 'hidden');
            $('#txtbuscar1').val("");
            $('#txtbuscar2').val("");
            llenarlista();
          } else if (combo_itemselect === "Tienda") {

        
            $('#txtbuscar1').attr('type', 'text');
            $('#txtbuscar1').attr('placeholder', 'Buscar Tienda');
  
            $('#txtbuscar2').attr('type', 'hidden');
            $('#txtbuscar1').val("");
            $('#txtbuscar2').val("");
            llenarlista();
          }else  if (combo_itemselect === "Fecha"){
       
            $('#txtbuscar1').attr('placeholder', 'Buscar Fecha Inicio');
            $('#txtbuscar2').attr('placeholder', 'Buscar Fecha Fin');
            $('#txtbuscar1').attr('type', 'date');
            $('#txtbuscar2').attr('type', 'date');
            $('#txtbuscar1').val("");
            $('#txtbuscar2').val("");
            llenarlista();

          }


      });

     $(".vaciotext").keyup(function(){

      var dato1 = document.getElementById('txtbuscar1').value;
      var dato2 = document.getElementById('txtbuscar2').value;

      if(dato1==""){
        llenarlista();
      }else{

          
          $.ajax({
                url: '../Arv_ajax/Pedidos/ajax_Boton_bus.php',
                type: 'POST',
                async: true,
                data: {action: 'buscar', condicion: combo_itemselect ,
              text1: dato1 , text2: dato2 , id: id_userlogin
                 },
                success: function(response){
          
                        if(response !='error'){

                              let resultado = JSON.parse(response);

                              if("resultado" in resultado == false){
                              
                                $("#llenarlista").empty();
                                // recorrer los resultados y agregarlos a la tabla
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].usuario + "</td>";
                                    fila += "<td>" + resultado[i].ref + "</td>";
                                    fila += "<td>" + "<label class='text-control' style='margin-right: 5px'>"+ resultado[i].cant + "</label>"+ 
                                    "<a  type ='button' class=' btn btn-success ver_productos'  referencia='"+ resultado[i].ref +"'  >"+
                                    "<i class='fas fa-eye'></i>  </a>"  +
                                    "</td>";
                                    fila += "<td>" + resultado[i].estadopago + "</td>";
                                    fila += "<td>" + resultado[i].precioproducto + "</td>";
                                    fila += "<td>" + resultado[i].IVA  + "</td>";
                                    fila += "<td>" + resultado[i].total + "</td>";
                                    fila += "<td>" + resultado[i].fecha + "</td>";
                                    fila += "<td> "+
                                            " <a type='button'  class='  btn btn-success ver_cliente  ' referencia='"+ resultado[i].ref +"'>  <i class='fas fa-eye'> </i> </a>"+
                                            " <button type='button' title='Borrar' class='btn btn-danger  borrar ' referencia='"+ resultado[i].ref  +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlista").append(fila);
                                }
                      
                            }else{
                                alert(resultado.resultado);

                            }
                        }
                  
                }

              });

      }

     })




    $(".botonbuscar").click(function()
    {
      var dato1 = document.getElementById('txtbuscar1').value;
      var dato2 = document.getElementById('txtbuscar2').value;
              $.ajax({
                url: '../Arv_ajax/Pedidos/ajax_Boton_bus.php',
                type: 'POST',
                async: true,
                data: {action: 'buscar', condicion: combo_itemselect ,
              text1: dato1 , text2: dato2, id: id_userlogin
                 },
                success: function(response){
          
                        if(response !='error'){

                              let resultado = JSON.parse(response);

                              if("resultado" in resultado == false){
                              
                                $("#llenarlista").empty();
                                // recorrer los resultados y agregarlos a la tabla
                                for(let i = 0; i < resultado.length; i++){
                                    let fila = "<tr>";
                                    fila += "<td>" + resultado[i].usuario + "</td>";
                                    fila += "<td>" + resultado[i].ref + "</td>";
                                    fila += "<td>" + "<label class='text-control' style='margin-right: 5px'>"+ resultado[i].cant + "</label>"+ 
                                    "<a  type ='button' class=' btn btn-success ver_productos'  referencia='"+ resultado[i].ref +"'  >"+
                                    "<i class='fas fa-eye'></i>  </a>"  +
                                    "</td>";
                                    fila += "<td>" + resultado[i].estadopago + "</td>";
                                    fila += "<td>" + resultado[i].precioproducto + "</td>";
                                    fila += "<td>" + resultado[i].IVA  + "</td>";
                                    fila += "<td>" + resultado[i].total + "</td>";
                                    fila += "<td>" + resultado[i].fecha + "</td>";
                                    fila += "<td> "+
                                            " <a type='button'  class='  btn btn-success ver_cliente  ' referencia='"+ resultado[i].ref +"'>  <i class='fas fa-eye'> </i> </a>"+
                                            " <button type='button' title='Borrar' class='btn btn-danger  borrar ' referencia='"+ resultado[i].ref  +"' >  <i class='fa fa-trash'> </i> </button> "+
                                            " </td>";
                                    fila += "</tr>";
                                    $("#llenarlista").append(fila);
                                }
                      
                            }else{
                                alert(resultado.resultado);

                            }
                        }
                  
                }

              });
  
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
     
//--End---//

function llenarlista(){


   
  $.ajax({
    url:'../Arv_ajax/Pedidos/ajax_lista.php',
    type: 'POST',
    async: true,
    data: {action: 'lista', id: id_userlogin },
    success: function(response){
      
        if(response !='error'){

        let resultado = JSON.parse(response);
      
        // vaciar el contenido de la tabla
        $("#llenarlista").empty();
        // recorrer los resultados y agregarlos a la tabla
            for(let i = 0; i < resultado.length; i++){
                let fila = "<tr>";
                
                fila += "<td>" + resultado[i].usuario + "</td>";
                fila += "<td>" + resultado[i].ref + "</td>";
                fila += "<td>" + "<label class='text-control' style='margin-right: 5px'>"+ resultado[i].Can_Articulos + "</label>"+ 
                "<a  type ='button' class=' btn btn-success ver_productos'  referencia='"+ resultado[i].ref +"'  >"+
                "<i class='fas fa-eye'></i>  </a>"  +
                "</td>";
                fila += "<td>" + resultado[i].estadopago + "</td>";
                fila += "<td>" + resultado[i].precioproducto + "</td>";
                fila += "<td>" + resultado[i].IVA  + "</td>";
                fila += "<td>" + resultado[i].total + "</td>";
                fila += "<td>" + resultado[i].fecha + "</td>";
                fila += "<td> "+

                        " <a type='button'  class='  btn btn-success ver_cliente  ' referencia='"+ resultado[i].ref +"'>  <i class='fas fa-eye'> </i> </a>"+
                        " <button type='button' title='Borrar' class='btn btn-danger  borrar ' referencia='"+ resultado[i].ref  +"' >  <i class='fa fa-trash'> </i> </button> "+
                        " </td>";
                fila += "</tr>";
                $("#llenarlista").append(fila);
            }
        }

    },error: function(error){console.log(error);} 
});

}

});
