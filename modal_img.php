<!-- MODAL CARRITO -->
<?php
?>



<div class="modal" id="modalproductoindex"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title nameProducto"   id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close"  onclick="coloseModal();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <form  action="" method="POST"    onsubmit="event.preventDefault();">
					
					<img class="rounded mx-auto d-block imgenvio"  src="Img/Productos_img/"  width="300"  alt=""><br>
					<div class="row">
						<div class="col">
						<input type="hidden" disabled="disabled" class="form-control" value="" name="producto_id" id="producto_id" required><br>
						</div>
						<div class="col">
						<input type="hidden" disabled="disabled" class="form-control" value="" name="txtestado" id="txtestado" required><br>
						</div>
						
					</div>

					<div class="row">
					<div class="col">
						<label  class="col-sm-6 col-form-label">Categoria:</label>
						<input type="text" disabled="disabled" class="form-control" value="" name="txtcategoria" id="txtcategoria" required><br>
						</div>
						<div class="col">
						<label  class="col-sm-6 col-form-label">Subcategoria:</label>
						<input type="text" disabled="disabled" class="form-control" value="" name="txtsubcategoria" id="txtsubcategoria" required><br>

						</div>
					
					</div>

					<label  class="col-sm-5 col-form-label">Descripción:</label>
					<textarea class="form-control" disabled="disabled" id="txtDescripcion" value="" name="txtDescripcion" rows="3"></textarea>
					
					<div class="row">
					<div class="col">
					<label  class="col-sm-4 col-form-label">Stock:</label>
					<input type="text" class="form-control" disabled="disabled" value="" name="txtcantidad" id="txtcantidad" required><br>
					</div>
					<div class="col">
					<label  class="col-sm-5 col-form-label">Precio:</label>
					<input type="text" class="form-control" disabled="disabled" value="" name="txtprecio" id="txtprecio" required><br>
					</div>
					</div>
					</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  onclick="coloseModal();">Close</button>
      </div>
    </div>
  </div>
</div>