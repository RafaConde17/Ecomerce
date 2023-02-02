<?php include('../template/subcabecera.php');?>
<script src="../../JS/select.js"></script>
<script src="../../JS/comandos.js"></script>
<script src="../JS/tipousuario.js"></script>


<div class=container>
     <div class="row"  >
            <div class="col-md-4" style="margin-top:10px">
                    <div class="card">
                                <div class="card-header" >
                                    Detalle Tipo usuario
                                </div>
                                
                                <div class="card-body ">
                                        <form method="POST" enctype="multipart/form-data">
                                     

                                            <div class="form-group">
                                            <label for="categoria">Tipo usuario:</label>
                                            <input type="text"  required class="form-control"  id="txttipousuario" placeholder="Tipo">
                                            </div>

                                                   
                                            <div class = "form-group">

                                                <select class="form-control " id="llenarcombo" >
                                                </select>
                                            
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

            <div class="col-md-7" style="margin-top:10px">
                <div class="card">
                        <div class="card-header">
                                    Lista Tipo usuario
                        </div>

                        <div class="card-body">
                            <table class=" table-bordered tabla">
                                <thead>
                                    <tr>
                                        <th> Tipo usuario</th>
                                        <th >Estado</th>
                                        <th >Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="llenarlista_tipoususario">
                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer">
                        </div>
                </div>
            </div>
</div>





<?php include('../template/pie.php');?>