



<div class="modal" id="modal_productos"  data-bs-backdrop="static" data-bs-keyboard="false"  aria-labelledby="staticBackdropLabel" >
  <div class="modal-dialog modal-dialog-scrollable" style= "width: 100%; height: 100%; padding: 0;">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title nameProducto"   id="title_productos">Ficha de Datos </h5>
                <button type="button" class="btn-close"  onclick="coloseModal_noupdate();" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                
                <table class="table table-bordered tabla">
                                        <thead>
                                            <tr>
                                               
                                            <th>N°</th>
                                            <th>Imagen</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                            </tr>
                                        </thead>
                                         <tbody id="llenarlista_modaldatos">
                                        </tbody>
                                    </table>
                                        
                           
                </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="coloseModal_noupdate();">Close</button>
            </div>
    </div>
  </div>
</div>