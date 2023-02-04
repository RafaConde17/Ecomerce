<?php include('../template/subcabecera.php');?>

<script src="../../JS/select.js"></script>
<script src="../../JS/comandos.js"></script>
<script src="../JS/usuario.js"></script>


<div class=container>
   

     <div class="row"  >
           
            <div class="col-md-12" style="margin-top:10px">
                <div class="card">
                        <div class="card-header">
                        <label for="label" style="font-weight: bold; font-size: 30px">     Lista Usuario</label>            
                                    <div class="text-right ">
                                    <button class="btn nuevousuario " type="button" value="" Style=" font-weight: bold; background-color: black;  border-color: gray; color: white; ">Nuevo </button>
                                    </div>
                        </div>

                        <div class="card-body">
                            <table class="tabla table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">Ususario</th>
                                        <th scope="col">Tipo usuario</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                              

                                <tbody id="llenarlistaususario">
                                </tbody>   
                            </table>
                        </div>

                        <div class="card-footer">
                        </div>
                </div>
            </div>
</div>



<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Administrador/seccion/modal_usu.php"; ?>
<?php include('../template/pie.php');?>