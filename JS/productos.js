$(document).ready(function() {

    $('.ver_produc').click(function(event){
      event.preventDefault();
  
             var producto= $(this).attr('product');
              var action = 'infoProducto';
  
              $.ajax({  url:'Arv_ajax/ajax_productos.php',
               type: 'POST',
               async: true,
               data: {action:action,producto:producto},
              success: function(response){
                console.log(response);
                
                if(response !='error'){
                  var info = JSON.parse(response);
                  console.log(info);
                  $('#producto_id').val(info.idproducto);
                  $('.nameProducto').html(info.producto);
                  $('#txtcategoria').val(info.categoria);
                  $('#txtsubcategoria').val(info.subcategoria);
                  $('#txtestado').val(info.detalleestado);
                  $('#txtDescripcion').val(info.descripcion);
                  $('#txtcantidad').val(info.cantidad);
                  $('#txtprecio').val(info.precio);
                  $('.imgenvio').attr("src","Img/Productos_img/" + info.imagen);
                }
              
              }
              ,error: function(error){console.log(error);} });
    
           $("#modalproductoindex").fadeIn();
      });
  
  
   
  });