<?php include('template/cabecera.php');




?>



<script src="../JS/comandos.js"></script>
<script src="../JS/perfil.js"></script>

<div class=container>
    <div class="row">
                <div class="col-md-6" style="margin-top: 10px">
                    <div class="card-body" style="background-color: #9B9B9B; width: 100%; height: 100%;">
                        <form method="POST" enctype="multipart/form-data">
                                <h1 class="display-5" style="text-align: center; color: white; font-weight: bold;">Foto de Usuario</h1>
                                <div class="mb-3">
                                <a>
                                <img class="img-responsive" title="imagen" id="txtimagen_img" style="margin: 0 auto; display: block; border-radius: 50%; width: 300px; height: 300px;" src="../Img/Usuarios_img/User_default.png">
                                </a>
                                </div>
                                <hr class="my-2">
                                <p class="lead" style="text-align: center; color: white; font-weight: bold;">Cambiar foto</p>
                                <div class="mb-3">
                                <input type="hidden" class="form-control" id="txtimagen_name">
                                <label for="img" style="color: white; font-weight: bold;">Imagen: </label>
                                <input type="file" class="form-control bloqueocampos" id="txtimagen_input" title="seleccionarimagen">
                                 </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 10px">
                    <div class="card-body" style="background-color: #9B9B9B; width: 100%; height: 100%;">
                        <form method="POST" id="formulario">
                                       
                            <h1 class="display-5" style="text-align: center; color: white; font-weight: bold;">Datos personales</h1>
                               <hr class="my-2">

                                        <div style="display: flex;">

                                            <div class="form-group x-sm-3">
                                                        <label for="inputUser" style="color: white; font-weight: bold;">Usuario:</label>
                                                        <input type="text" style="width: 100%;" class="form-control" id="txtusuario" placeholder="Usuario" disabled required autocomplete="username">
                                            </div>

                                            <div class="form-group mx-sm-3">
                                                    <label for="inputPass" style="color: white; font-weight: bold;">Contraseña:</label>
                                                    
                                                    <div style="display: flex;">
                                                        <input type="password" style="width: 80%;" class="form-control bloqueocampos" id="usuario_con" placeholder="Contraseña" required autocomplete="current-password">
                                                        <button id="show_password" title="vercontraseña" class="btn btn-primary bloqueocampos" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                                    </div>

                                            </div>

                                        </div>
                                                        

                                        <div class="form-group">
                                            <label for="inputEmail" style =" color: white; font-weight: bold;">Correo electrónico:</label>
                                            <input type="email" class="form-control bloqueocampos" id="txtemail" aria-describedby="emailHelp" placeholder="Enter email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputDireccion" style =" color: white; font-weight: bold;">Nombres:</label>
                                            <input type="text" class="form-control bloqueocampos" id="txtnombres" placeholder="Nombres" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputCelular" style =" color: white; font-weight: bold;">Apellidos:</label>
                                            <input type="text" class="form-control bloqueocampos" id="txtapellidos" placeholder="Apellidos" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="inputCelular" style =" color: white; font-weight: bold;">Celular:</label>
                                            <input type="text" class="form-control bloqueocampos" id="txtcelular" placeholder="Celular" required>
                                        </div>


                                <hr class="my-2">

                                <div style=" text-align:center">

                                            <div class="btn-group "  aria-label="">
                                                <input type="hidden"  readonly class="form-control"   id="txtID"  value="<?php echo $idusuario;?>" >
                                                <button type="button"  id="Modificar" class="btn btn-success Modificardatos">Modificar</button>
                                            </div>

                                            <div class="btn-group "  aria-label="">
                                                <button type="button"  id="Guardar" class="btn btn-warning Guardardatos" >Guardar</button>
                                            </div>

                                            <div class="btn-group "  aria-label="">
                                                <button type="button"  id="Cancelar" class="btn btn-info Cancelardatos" >Cancelar</button>
                                            </div>

                                </div>
                        </form>
                    </div>
                </div>
    </div>
</div>
<?php include('../Cliente/template/pie.php');