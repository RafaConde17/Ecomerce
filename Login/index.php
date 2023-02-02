  
  <?php

include('../Administrador/config/bd.php');

session_start();


if(isset($_SESSION['idusuario'])){

  $idusuario = $_SESSION['idusuario'];
  $tipousuario = $_SESSION['tipousuario'];

  if($tipousuario == 1){
  echo "<script>location.href='../Administrador/Perfil.php'; </script>";
  }else if($tipousuario ==2){

  echo "<script>location.href='../Afiliado/Perfil.php'; </script>";
  }else if($tipousuario==3){
  echo "<script>location.href='../Cliente/Perfil.php'; </script>";
  }


}



  ?>
  
  
  
  <!-- b4-$ + tab -->

<!doctype html>
<html lang="en">
  <head>
    <title>Ecomerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/estilos.css">

    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   


  
  
  </head>

  
      <body>
            <!-- b4-grid-dafaul -->
            <script src="JS/index.js"></script>

              <div class="container">
                <div class="row">
                      <!-- b4-grid-col-->
                    <div class="col-md-4">
                        </div>

                    <div class="col-md-4">
                        <!-- b4-card-head-foot-->
                        </br>
                        </br>
                        </br>
                        <div class="card">
                                      <div class="card-header">
                                      Login
                                      </div>

                                      <div class="card-body">
                                           <!-- !crt-form-login-->
                                          <form method="POST">
                                          <div class = "form-group">
                                          <label >Usuario:</label>
                                          <input type="text" class="form-control"  id="txtusuario"   placeholder="Ingrese usuario" autocomplete="username">
                                          </div>

                                          <div class="form-group">
                                          <label >Contraseña:</label>
                                          <input type="password" class="form-control" id="txtcontrasenia"  placeholder="Ingresa contraseña" autocomplete="current-password">
                                          </div>
                                            
                                          <button type="button" class="btn btn-primary botoningresar ">Ingresar</button>
                                          </form>
                                      </div>

                                      <div class="card-footer">
                                      </div>
                        </div>
                         
                        
                    </div>
                    
                </div>
              </div>
      </body>
</html>