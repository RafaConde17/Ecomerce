
<style type="text/css">

.modal {
  position: fixed;
  background: rgba(0,0,0,0.7);
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;

}
.contenedor{
  position: relative;
  top: 3%;
  width: 90%;
  height: auto;

  border-radius: 15px;
  background: #fff;
  margin: auto;
  z-index: 1;
  background-color:   #9B9B9B;
  overflow-y: scroll;
  overflow-x: scroll;
}
</style>
  



<div class="modal" id="modal_cliente"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">    <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;"> Datos de Envió </p>
        </h5>
        <button type="button" class="btn-close"  onclick="coloseModal();" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container p-5"  style=" background-color: white;">

                                                <form  class="row g-3 " method="POST" >


                                                            <div class="col-md-12">                                               
                                                            <label for="validationCustom01" class="form-label">Nombres:</label>
                                                            <input type="text" autofocus  class="form-control" id="nombre" title="Dato obligatorio" name="nombre" disabled required>
                                                            </div>

                                                            <div class="col-md-12">
                                                            <label for="validationCustom02" class="form-label">Apellidos:</label>
                                                            <input type="text" class="form-control" id="apellidos"  title="Dato obligatorio" name="apellidos"  disabled required>
                                                             
                                                            </div>

                                                            <div class="col-md-4">
                                                            <label for="validationCustom04" class="form-label">Teléfono:</label>
                                                            <input type="number" class="form-control" id="telefono"  title="Dato obligatorio" name="telefono" disabled  required>
                                                            </div>

                                                            <div class="col-md-12">
                                                            <label for="validationCustom03" class="form-label">Dirección:</label>
                                                            <input type="text" class="form-control" id="direccion"  title="Dato obligatorio" name="direccion" disabled required> </input>
                                                        
                                                            </div>


                                                </form>

                            </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="coloseModal()";>Close</button>
      </div>
    </div>
  </div>
</div>
  
