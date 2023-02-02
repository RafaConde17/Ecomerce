<?php include('../template/subcabecera.php');?>
<script src="../../JS/select.js"></script>
<script src="../../JS/comandos.js"></script>
<script src="../JS/productos.js"></script>

<div class=container>
   

     <div class="row"  >
           
            <div class="col-md-12" style="margin-top:10px">
                <div class="card">
                        <div class="card-header">
                        <label for="label" style="font-weight: bold; font-size: 30px">     Lista Productos</label>            
                   
                                    <div class="text-right ">
                                    <button class="btn nuevo " type="button" value="" Style=" font-weight: bold; background-color: black;  border-color: gray; color: white; ">Nuevo </button>
                                    </div>
                        </div>

                        <div class="card-body">
                                    <!-- b4-table-default-->
                                    <table class="table table-bordered tabla">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Producto</th>
                                                <th>Categoria</th>
                                                <th>Sub Categoria</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Imagen</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="llenarlista_categoria">
                                        </tbody>
                                    </table>
                        </div>

                        <div class="card-footer">
                        </div>
                </div>
        </div>
</div>
<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Administrador/seccion/modal_pro.php"; ?>
<?php include('../template/pie.php');?>