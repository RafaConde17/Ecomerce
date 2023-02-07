
$(document).ready(function() {

    $.ajax({
        url: 'Arv_ajax/Arv_ajax_select/ajax_listaAfiliados.php',
        type: 'POST',
        async: true,
        data: { action: 'buscarafiliado' },
        success: function(response) {
            if (response !== 'error') {
                let resultado = JSON.parse(response);

                // vaciar el contenido de la tabla
                $("#llenarselect_productos").empty();
                // recorrer los resultados y agregarlos a la tabla
                for (let i = 0; i < resultado.length; i++) {
                    let fila = "<a class='nav-item nav-link cambiodeproductos' style='color: white;' href='Productos.php' referencia='"+ resultado[i].id +"'>" + resultado[i].texto + " </a>";
                    $("#llenarselect_productos").append(fila);
                }
            }
        },
        error: function(error) { console.log(error); }
    });

    $("#llenarselect_productos").on("click", ".cambiodeproductos", function()
    {
        variableGlobal= $(this).attr('referencia');
        
        localStorage.setItem("variableGlobal", variableGlobal);
        
        const xhr = new XMLHttpRequest();

        xhr.open("GET", "Carrito/borrarcarro.php", true);
        xhr.send();



    });



});