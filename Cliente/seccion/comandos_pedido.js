$(document).ready(function() {

    $('.ver_cliente').click(function(event){
            event.preventDefault();
            var  referencia = $(this).attr('refe');
            var action = 'buscarcliente';
              

                $.ajax({
                    url:'ajaxcliente.php',
                    type: 'POST',
                    async: true,
                    data: {action:action,referencia:referencia},
                    success: function(response){
            
                    console.log(response);
                    
                    if(response !='error'){
                        let resultado = JSON.parse(response);
                        console.log(resultado);
              
                        $('#nombre').val(resultado.nombre);   
                        $('#apellidos').val(resultado.apellidos);
                        $('#direccion').val(resultado.direccion);
                        $('#telefono').val(resultado.telefono);  
                }

                    },error: function(error){console.log(error);} 
                });

            
                $("#modal_cliente").fadeIn();    
            });


    $('.ver_productos').click(function(event){
        event.preventDefault();
        let template = '';
        let total = 0;
        let subtotal =0;
        let iva =0;
        var  referencia = $(this).attr('refe');
        var action = 'buscarproductos';
     //   alert(variable);
     
        $("#idmodal").val(referencia);
        
        $.ajax({  
            url:'ajaxpedido.php',
            type: 'POST',
            async: true,
            data: {action:action,referencia:referencia},
            success: function(response){
            
            console.log(response);

      

            if(response !='error'){
                    let resultado = JSON.parse(response);
                    console.log(resultado);

                    resultado.forEach(resultado => {
                    template += `
               
                           
                    <tr Style="background: white;   " >
                                        <td  style="vertical-align: middle;">${resultado.indice} </td>
                                        <td  style=" vertical-align: middle;"><img  src="../../Img/Productos_img/${resultado.imagen}" alt="" width="100"></td>
                                        <td  style=" vertical-align: middle;">${resultado.articulos} </td>
                                        <td  style=" vertical-align: middle;">${resultado.cantidad} </td>
                                        <td  style=" vertical-align: middle;">${resultado.precio.toFixed(2)} </td>
                                        <td  style=" vertical-align: middle;">${resultado.total.toFixed(2)} </td>
                        
                       </tr>    
                
                    `
                    subtotal += resultado.total;
                            
                    });

                    let base = subtotal/1.18;
                    iva = subtotal - base;
                    total = subtotal + iva;
                    $('#llenartablas').html(template);
                    $('#subtotal').html(subtotal.toFixed(2));   
                    $('#iva').html(iva.toFixed(2));   
                    $('#totalpedido').html(total.toFixed(2));  
                    $('#referen').html(referencia);   
            }




        },error: function(error){console.log(error);} });
     
        $("#modalpedido").fadeIn();
    });
});

                                    function coloseModal(){
                                    //   $('#modal_img').modal('exit');
                                    $(".modal").fadeOut();
                                    }

                                    function blockear(evObject) {

                                    evObject.preventDefault();

                                    }