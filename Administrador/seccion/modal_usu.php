<!-- MODAL CARRITO -->
<?php
?>



<div class="modal" id="modalusuarioadmin"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title nameProducto"   id="staticBackdropLabel">Datos personales</h5>
                <button type="button" class="btn-close"  onclick="coloseModal();" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                
                                        
                                                <form>
                                            

                                                                <h1  style="text-align: center;    font-weight: bold;">Foto de Usuario</h1>
                                                                        <div  class="mb-3">
                                                                         <img class="rounded mx-auto d-block usuario_img"  src="../../Img/Usuarios_img/User_default.png"  width="150"  alt="" id="modal_imagen"><br>
                                                                      
                                                                       
                                                                        </div>
                                                                        <hr class="my-2">
                                                                        <p class="lead" style="text-align: center;   font-weight: bold;">Cambiar foto</p>

                                                                        <div  class="mb-3">
                                                                        <input type="file"  class="form-control bloqueocampos"   id="usuario_img" placeholder="Imagen" >
                                                                        <input type="hidden" style="width: 100%;" class="form-control " id="usuario_nom_img"> 
                                                                     
                                                                        
                                                                    </div>


                                                                <hr class="my-2">
                                                                <input type="hidden" class="form-control bloqueocampos" id="usuario_id" name="txtID" value="">
                                                        
                                                                <div style="display:flex; " >

                                                                                <div class="form-group  x-sm-3 " >
                                                                                    <label for="inputUser" style ="   font-weight: bold;">Usuario:</label>
                                                                                    <input type="text" pattern="[0-9]*" style="width: 100%;" class="form-control usuario_usu" id="usuario_usu" name="txtusuario" placeholder="Usuario" disabled required autocomplete="username"> 
                                                                                </div>
                                                                                    
                                                                                <div class="form-group  mx-sm-3 "  >
                                                                                    
                                                                                    <label for="inputPass" style ="   font-weight: bold;">Contraseña:</label>
                                                                                    <div style="display:flex;">
                                                                                    <input type="password" style="width: 80%; " class="form-control bloqueocampos" id="usuario_con" name="txtcontraseña" placeholder="Contraseña" required="" disabled="disabled" autocomplete="current-password">
                                                                                    <button id="show_password" class="btn btn-primary bloqueocampos" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                                                                    </div>
                                                                                </div>
                                                                </div>


                                                          
                                                                <div style="display:flex; " >
                                                                <div class = "form-group  x-sm-3">
                                                                        <label for="inputUser" style ="  font-weight: bold;" >Tipo Usuario:</label>
                                                                        </select>

                                                                    </div>
                                                                    <div class = "form-group  x-sm-3" style="margin-left: 10px">
                                                                        <select class="form-control bloqueocampos llenarcombo_tipousu" id="llenarcombo_tipousu" name="selectedValue" >
                                                                        </select>

                                                                    </div>
                                                                 </div>



                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput" style ="   font-weight: bold;">Nombres</label>
                                                                    <input type="text" class="form-control bloqueocampos" id="usuario_nom" name="txtnombres" placeholder="Nombres"  required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="formGroupExampleInput" style ="  font-weight: bold;">Apellidos</label>
                                                                    <input type="text" class="form-control bloqueocampos" id="usuario_ape" name="txtapellidos" placeholder="Apellidos"  required >
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1" style ="   font-weight: bold;">Correo Electronico</label>
                                                                    <input type="email" class="form-control bloqueocampos" id="usuario_cor" name="" 
                                                                        aria-describedby="emailHelp" placeholder="Correo Electronico"  required>
                                                                </div>

                                                            
                                                                <div style="display:flex; " >

                                                                        <div class="form-group  x-sm-3 " >
                                                                            <label for="inputUser" style ="  font-weight: bold;" >Telefono:</label>
                                                                            <input type="number" style="width: 100%;" class="form-control bloqueocampos"  id="usuario_num" name="txttelefono"  placeholder="Numero"   >
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