<!-- MODAL CARRITO -->
<?php
?>



<div class="modal" id="modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title nameProducto"   id="staticBackdropLabel">Ficha de Datos </h5>
                <button type="button" class="btn-close"  onclick="coloseModal();" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                
                                        
                                                <form>
                                            

                                                                <h1  style="text-align: center;    font-weight: bold;">Foto del producto</h1>
                                                                        <div  class="mb-3">
                                                                         <img class="rounded mx-auto d-block "  src="../../Img/Productos_img/Producto_default.jpg"  width="200"  alt="" id="modal_imagen"><br>
                                                                      
                                                                       
                                                                        </div>
                                                                        <hr class="my-2">
                                                                        <p class="lead" style="text-align: center;   font-weight: bold;">Cambiar foto</p>

                                                                        <div  class="mb-3">
                                                                        <input type="file"  class="form-control bloqueocampos"   id="modal_input_img" >
                                                                        <input type="hidden" class="form-control " id="modal_nombre_img"> 
                                                                     
                                                                        
                                                                    </div>


                                                                <hr class="my-2">
                                                              
                           
                                                                <div class="form-group  x-sm-3 " >
                                                                    <label for="" style ="   font-weight: bold;">Producto:</label>
                                                                    <input type="text"  style="width: 100%;" class="form-control producto " id="txtproducto"  placeholder="Producto" disabled required > 
                                                                </div>

                                                          
                                                                <div style="display:flex; " >
                                                                <div class = "form-group  x-sm-3">
                                                                        <label for="inputUser" style ="  font-weight: bold;" >Categoria:</label>
                                                                       

                                                                 </div>
                                                                    <div class = "form-group  x-sm-3" style="margin-left: 10px">
                                                                        <select class="form-control bloqueocampos " id="categoria_combo"  >
                                                                        </select>

                                                                    </div>
                                                                 </div>


                                                                <div class="form-group">
                                                                    <label for="" style ="   font-weight: bold;">Sub Categoria</label>
                                                                    <input type="text" class="form-control bloqueocampos" id="txtsubcategoria" placeholder="Sub Categoria"  required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label for="" style ="  font-weight: bold;" >Descripcion:</label>
                                                                <textarea type="text"  required class="form-control bloqueocampos"  id="txtdescripcion" placeholder="Descripcion"></textarea>    
                                                                </div>

                                                                <div style="display:flex; " >
                                                                    <div class = "form-group  x-sm-3">
                                                                        <label for="" style ="  font-weight: bold;" >Cantidad:</label>
                                                                        <input type="text" class="form-control bloqueocampos" id="txtcantidad" placeholder="Cantidad"  required>
                                                                    </div>

                                                                    <div class = "form-group  x-sm-3" style="margin-left: 10px">
                                                                        <label for="" style ="  font-weight: bold;" >Precio:</label>
                                                                        <input type="text" class="form-control bloqueocampos" id="txtprecio" placeholder="Precio"  required>
                                                                    </div>
                                                                 </div>



                                                                <div style="display:flex; " >
                                                                <div class = "form-group  x-sm-3">
                                                                        <label for="inputUser" style ="  font-weight: bold;" >Estado:</label>
                                                                       

                                                                    </div>
                                                                    <div class = "form-group  x-sm-3" style="margin-left: 10px">
                                                                        <select class="form-control bloqueocampos " id="llenarcombo"  >
                                                                        </select>

                                                                    </div>
                                                                 </div>


                                                                <div class="btn-group"  >
                                                                    <input type="hidden" class="form-control bloqueocampos" id="txtID"  value="">
                                                        
                                                                    <button type="button"    value="Modificardatos" class="btn btn-success Modificardatos "  id="BotonModificarIngresar"></button>
                                                                </div>

                                                                <div class="btn-group"  >
                                                                <button type="button"   value="Guardardatos" class="btn btn-warning Guardardatos">Guardar</button>
                                                                </div>

                                                                <div class="btn-group"  >
                                                                <button type="button"   value="Cancelardatos" class="btn btn-secondary Cancelardatos"  formnovalidate="">Cancelar</button>
                                                                </div>

                                                </form>
                           
                </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="coloseModal();">Close</button>
            </div>
    </div>
  </div>
</div>