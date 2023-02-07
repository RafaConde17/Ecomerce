<?php session_start();
ob_start();
if(isset( $_SESSION["carrito"])){
  $carrito_mio = $_SESSION["carrito"];
  $total_cantidad = 0;
  for ($i = 0; $i < count($carrito_mio); $i++) {
    if (isset($carrito_mio[$i])) {
      if ($carrito_mio[$i] != NULL) {
        if (!isset($carrito_mio[$i]["cantidad"])) {
          $carrito_mio[$i]["cantidad"] = 0;
        }
        $total_cantidad = $total_cantidad + $carrito_mio[$i]["cantidad"];
      }
    }
  }}
if(!isset($total_cantidad))
  {$total_cantidad=0;
  }else{
  $total_cantidad = $total_cantidad;}

  
if (isset($_SESSION["idusuario"])) {
  $idusu = $_SESSION["idusuario"];
  echo "<script>var id_userlogin=".$idusu.";</script>";
}else{
  $idusu="";
}?>
    
<!DOCTYPE html>
<html lang="en">    
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecomerce</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/estilos.css">
    
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<script>
  // Array con las rutas de las imágenes
  var imagenes = ['Img/fondoindex/imagen1.jpg',
                  'Img/fondoindex/imagen2.jpg',
                  'Img/fondoindex/imagen3.jpg'];
  
  // Índice de la imagen actual
  var indiceActual = 0;
  
  function cambiarImagen() {
    // Cambiar la imagen de fondo
    document.body.style.backgroundImage = "url('" + imagenes[indiceActual] + "')";
    
    // Incrementar el índice
    indiceActual++;
    
    // Si se ha llegado al final del array, volver al principio
    if (indiceActual >= imagenes.length) {
      indiceActual = 0;
    }
  }
  
  // Cambiar la imagen cada 5 segundos
  setInterval(cambiarImagen, 5000);
</script>


<style>

  body {
    background-image: url('Img/fondoindex/imagen1.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
  
   <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   
        

 <script >  var  variableGlobal=""; </script>

<script src="JS/cabecera.js"></script>
<script src="JS/comandos.js"> </script>

<script src="JS/productos.js"> </script>




<body>
<nav class="navbar navbar-expand-lg navbar-light bg-purple" style="background: purple">
<div class="container-fluid">
<img width="100" src="Img/WASY.png" class=" rounded mx-auto d-block">
    <a class="nav-link" data-toggle="modal" data-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i><?php echo $total_cantidad;?></a>
    
    
    <button type="button" class="navbar-toggler"  data-toggle="collapse" data-target="#navbarMenu"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon color='white'" ></span> 

    </button>
          
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
              <a href="index.php" class="nav-link active" style="color: white;">Inicio</a> </li>

              <li class="dropdown">
                  <div class="dropdown">
                      <a href="#" class="dropdown-toggle nav-item nav-link" style="color: white;" data-bs-toggle="dropdown">Productos</a>
                      <div class="dropdown-menu" style="background: purple">
                          <div id="llenarselect_productos">
                          </div>
                      </div>
                  </div>
              </li>




        <li class="nav-item">
            <a href="Nosotros.php" class="nav-link" style="color: white;">Nosotros</a></li>
            
 
        <li class="dropdown">
              <div class="dropdown">
                    <a href="#" class="dropdown-toggle nav-item nav-link"  style="color: white;" data-bs-toggle="dropdown">Usuario</a>
                          <div class="dropdown-menu" style="background: purple">
                                    <?php
                                      if ($idusu !="") {
                                        echo "<a class='nav-item nav-link'  style='color: white; '  href='Login/index.php'> Ver Perfil </a>";
                                        echo "<a class='nav-item nav-link'  style='color: white; display:none;' href='Login/index.php'> Iniciar Sesión </a>";
                                        echo "<a class='nav-item nav-link'  style='color: white; ;' href='Login/seccion/salir.php'> Cerrar Sesión </a>";

                                      } else {
                                        echo "<a class='nav-item nav-link'  style='color: white; display:none;'  href='Login/index.php'> Ver Perfil </a>";
                                        echo "<a class='nav-item nav-link'  style='color: white; ' href='Login/index.php'> Iniciar Sesión </a>";
                                        echo "<a class='nav-item nav-link'  style='color: white; display:none;' href='Login/seccion/salir.php'> Cerrar Sesión </a>";
               
                                      }
                                    ?>
                          </div>
                </div>
          </li>
        </ul>
    </div>
 


  </div>
</nav>


<?php include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Carrito/modal_cart.php"; ?>
<div class=container>
     
<div class="row">
                