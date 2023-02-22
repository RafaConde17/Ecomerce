<?php include('../template/subcabecera.php');?>


    <!-- b4-grid-col-->
    <script src="../../JS/select.js"></script>
    <script src="../../JS/comandos.js"></script>
    <script src="../JS/medio_envio.js"></script>


    <div class=container>
        <div class="row"  >
                    <div class="col-md-4" style="margin-top:10px;">
                        <!-- b4-card-head-foot -->   
                        <div class="card">
                                <div class="card-header">
                                    Datos
                                </div>
                                <div class="card-body">
                                <!-- !crt-form-login  para poder enviar fotos y archivos-->    
                                                <form method="POST" enctype="multipart/form-data">
                                                            
                                                        
                                                            <div class="form-group">
                                                            <label for="text">Medio Envio:</label>
                                                            <input type="text" required class="form-control"  id="txtmedioenvio" placeholder="Categoria">
                                                            </div>

                                                            <div class="form-group">
                                                            <label for="text">Imagen</label>
                                                            <img class="img-thumbnail rounded"  id="txtImagen_imagen" src="../../Img/Medio_Envio/EnviorDefault.jpg" width="100" alt="" srcset="">
                                                            <input type="file"  class="form-control"  id="txtImagen" placeholder="Imagen">
                                                            <input type="hidden" required class="form-control"  id="txtImagen_name" placeholder="Categoria">
                                                            </div>

                                                            <div class="form-group">
                                                            <label for="text">Descripcion:</label>
                                                            <textarea type="text"  required class="form-control"  id="txtdescripcion" placeholder="Categoria"></textarea>    
                                                            </div>

                                                            <div class="form-group">
                                                            <label for="text">Precio:</label>
                                                            <input type="text" required class="form-control"  id="txtprecio" placeholder="Precio">
                                                            </div>

                                                
                                                            <div class = "form-group">
                                                            <label for="text">Estado:</label>
                                                            <select class="form-control " id="llenarcombo" name="selectedValue" ></select>
                                                            </div>

                                                            <div class="btn-group "  aria-label="">
                                                                <input type="hidden"  readonly class="form-control"   id="txtID"  >
                                                                <button type="button"  id="Agregar" class="btn btn-success Agregardatos">Agregar</button>
                                                            </div>

                                                            <div class="btn-group "  aria-label="">
                                                                <button type="button"  id="Modificar" class="btn btn-warning Modificardatos2" >Modificar</button>
                                                            </div>

                                                            <div class="btn-group "  aria-label="">
                                                                <button type="button"  id="Cancelar" class="btn btn-info Cancelardatos" >Cancelar</button>
                                                            </div>

                                                </form>

                                </div>
                                <div class="card-footer">
                                 </div>
                        </div>
                    
                    </div>

                        <!-- b4-grid-col-->
                    <div class="col-md-8" style="margin-top:10px;">
                        <div class="card">
                                        <!-- b4-table-default-->
                                        <div class="card-header">
                                                    Lista
                                        </div>

                                        <div class="card-body">
                                        
                                            <table class="table-bordered tabla">
                                                <thead >
                                                    <tr>
                                                        <th>Usuario</th>
                                                        <th>Medio envio</th>
                                                        <th >Imagen</th>
                                                        <th >Precio</th>
                                                        <th >Estado</th>
                                                        <th >Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="llenarlista">
                                                
                                                </tbody>
                                            </table>
                                       
                                        </div>

                                        <div class="card-footer">
                                        </div>

                        </div>
                    </div>


        </div>
    </div>
<?php include('../template/pie.php');?>