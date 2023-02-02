  
  <?php

$txtusuario=(isset($_POST['txtusuario']))?$_POST['txtusuario']:"";
$txtcontraseña=(isset($_POST['txtcontraseña']))?$_POST['txtcontraseña']:"";

include('config/bd.php');
session_start();

if($_POST){
  $sentenciaSQL=$conexion->prepare("SELECT * FROM `tbusuarios` WHERE Usuario = :usuario AND Contraseña=:contrasenia");
  $sentenciaSQL->bindParam(':usuario',$txtusuario);
  $sentenciaSQL->bindParam(':contrasenia',$txtcontraseña);
  $sentenciaSQL->execute();

  $listaloginusu=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
   
  if(($listaloginusu!="")){

     $usuario=$listaloginusu['Usuario'];
     $contraseña=$listaloginusu['Contraseña'];
     $nombreusuario=$listaloginusu['Nombres'] ;
     $apellidousuario= $listaloginusu['Apellidos'];
     $idtipousuario= $listaloginusu['idtipousuario'];
     $idusuario= $listaloginusu['idusuario'];

      $_SESSION['usuario']="ok";
      $_SESSION['nombreusuario']= $nombreusuario . " " . $apellidousuario ;
      $_SESSION['tipo']= $idtipousuario ;
      $_SESSION['idusuario']= $idusuario  ;
      $_SESSION['datousuario']=  $usuario. ": ".   $nombreusuario . " " . $apellidousuario ;
      
        $sentenciaSQL=$conexion->prepare("SELECT tipo 	 FROM tbtipousuario where idtipousuario = :idex ");
        $sentenciaSQL->bindParam(':idex',$_SESSION['tipo']);
        $sentenciaSQL->execute();

        $listatipousuario=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
     if($listatipousuario['tipo']=="Administrador"){
      header('Location:inicio.php');
     }else{
      header('Location:../index.php');
     } 


  
  }else{
    $mensaje="Error: El usuario o contraseña son incorrectos";

  }
  

}

  ?>
  
  
  
  <!-- b4-$ + tab -->

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<!-- b4-grid-dafaul -->
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
                       
                        <div class="card-body">

                        <?php if(isset($mensaje)) {?>
                         <!-- b4-alert-default-->
                          <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                          </div>

                          <?php } ?>
                         <!-- !crt-form-login-->
                        <form method="POST">
                        <div class = "form-group">
                        <label >Usuario:</label>
                        <input type="text" class="form-control" name="txtusuario" id="txtusuario"  aria-describedby="emailHelp" placeholder="Ingrese usuario">
                        </div>

                        <div class="form-group">
                        <label >Contraseña:</label>
                        <input type="password" class="form-control" name="txtcontraseña" id="txtcontraseña"  placeholder="Ingresa contraseña">
                        </div>

                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        </form>
                        
                        
                </div>
               

                </div>
               
            </div>
            
        </div>
        
    </div>
  </div>
    </body>
</html>