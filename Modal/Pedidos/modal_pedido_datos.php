



<div class="modal" id="modal_cliente"  style=" width: 90%;  height: 90%; margin: auto;" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" >
  <div class="modal-dialog modal-dialog-scrollable" style= "width: 100%; height: 100%; padding: 0;">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title nameProducto"   id="staticBackdropLabel">Ficha de Datos </h5>
                <button type="button" class="btn-close"  onclick="coloseModal_noupdate();" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                
                <form  class="row g-3 " method="POST" >


                        <div class="col-md-12">                                               
                        <label for="validationCustom01" class="form-label">Nombres:</label>
                        <input type="text"   title="Nombres" class="form-control" id="txtnombre"  disabled >
                        </div>

                        <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">Apellidos:</label>
                        <input type="text" title="Apellidos" class="form-control" id="txtapellidos"    disabled >
                        
                        </div>

                        <div class="col-md-4">
                        <label for="validationCustom04" class="form-label">Teléfono:</label>
                        <input type="number" title="Teléfono" class="form-control" id="txttelefono"  disabled  >
                        </div>

                        <div class="col-md-12">
                        <label for="validationCustom03" class="form-label">Dirección:</label>
                        <input type="text" title="Dirección" class="form-control" id="txtdireccion"   disabled > </input>

                        </div>


</form>

                           
                </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="coloseModal_noupdate();">Close</button>
            </div>
    </div>
  </div>
</div>