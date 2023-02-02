
<?php include('../template/subcabecera.php');?>

<script src="../../JS/comandos.js"></script>
<script src="../JS/pedidos.js"></script>


<div class=container>
   

     <div class="row"  >
           
            <div class="col-md-12" style="margin-top:10px">
                <div class="card">
                    <div class="card-header">
                        <label for="label" style="font-weight: bold; font-size: 30px">Lista pedidos</label>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <div class="form-group">
                                        <select id="combo" title="Combo" class="form-control buscarcombo">
                                            <option value="Referencia">Referencia</option>
                                            <option value="Usuario">Usuario</option>
                                            <option value="Fecha">Fecha</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control vaciotext" id="txtbuscar1" placeholder="Buscar Referencia">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="txtbuscar2" placeholder="Buscar Referencia">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <button class="btn botonbuscar" type="button" value="" style="font-weight: bold; background-color: black; border-color: gray; color: white;">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                        <div class="card-body">
                                    <!-- b4-table-default-->
                                    <table class="table table-bordered tabla">
                                        <thead>
                                            <tr>
                                            <th >N°</th>
                                            <th >Usuario</th>
                                            <th>Ref</th>
                                            <th>Productos</th>
                                            <th>Medio</th>
                                            <th>Estado</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
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
<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Administrador/seccion/modal_pedido_pro.php"; ?>
<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Administrador/seccion/modal_pedido_datos.php"; ?>
<?php include('../template/pie.php');?>