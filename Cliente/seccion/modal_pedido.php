
<style type="text/css">

.modal {
 
  background: rgba(0,0,0,0.7);
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;

}
.contenedor{
  position: relative;
  top: 3%;

  height: auto;

  border-radius: 15px;
  background: #fff;
  margin: auto;
  z-index: 1;
  background-color:   #9B9B9B;

}
</style>
  
<div class="modal" id="modalpedido"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">    <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;"> lista de productos:  <a id="referen" ></a> </p>
                                        </h5>
                                        <button type="button" class="btn-close"  onclick="coloseModal();" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                
                                                                <div class="container p-5"  style=" background-color: white;">
                                                                                                <table class="tabla1 text-center" Style="background: white;  width: 100%; "   >
                                                                                                                        <thead class="table table-bordered tabla"  >
                                                                                                                                        <tr Style="background: white;   " >
                                                                                                                                        <th>N°</th>
                                                                                                                                        <th>Imagen</th>
                                                                                                                                        <th>Producto</th>
                                                                                                                                        <th>Cantidad</th>
                                                                                                                                        <th>Precio</th>
                                                                                                                                        <th>Total</th>
                                                                                                                                        </tr>
                                                                                                                        </thead>

                                                                                                                        <tbody id="llenartablas" class="table table-bordered table-sm" >

                                                                                                                        </tbody>

                                                                                                                        
                                                                                                </table>
                                                                                                        <div Style=" width: 100%; " >
                                                                                                                        <li class="list-group-item d-flex justify-content-between  disabled  width: 100%;">
                                                                                                                        <span style=" color: #000000;">
                                                                                                                                <strong>Sub Total
                                                                                                                                </strong>
                                                                                                                        </span>
                                                                                                                        <span style=" color: #000000;">
                                                                                                                                <strong >S/. 
                                                                                                                                <a id="subtotal"></a>
                                                                                                                        
                                                                                                                                </strong>
                                                                                                                        </span >
                                                                                                                        </li>	
                                                                                                                
                                                                                                                        <li class="list-group-item d-flex justify-content-between  disabled">
                                                                                                                        <span style=" color: #000000;"><strong>I.V.A </Strong> </span>
                                                                                                                        <span style=" color: #000000;" class="grey-text font-weight-bold" style="font-size: 14px;">
                                                                                                                                <strong>S/. 
                                                                                                                                <a id="iva"></a>
                                                                                                                                </strong>
                                                                                                                        </span>
                                                                                                                        </li>

                                                                                                                        <li class="list-group-item d-flex justify-content-between  disabled " style="  margin-bottom: 10px;">
                                                                                                                        <span style="text-align:left; "><strong>Total </strong></span>
                                                                                                                        <strong style="text-align: left; ">S/.  <a id="totalpedido"></a> </strong>
                                                                                                                        </li>  
                                                                                                        </div>  
                                                                                        
                                                                </div>
                                </div>                                
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" onclick="coloseModal()";>Close</button>
                                </div>
        </div>
        </div>
</div>
