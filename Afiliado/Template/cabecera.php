<?php session_start();
include('../Administrador/config/bd.php');



if(isset( $_POST["id"])){

    $_SESSION['idusuario'] = $_POST['id'] ;
    $_SESSION['tipousuario'] = $_POST['tipousuario'] ;
}

if(isset($_SESSION['idusuario'])){

    $idusuario = $_SESSION['idusuario'];

}else{
    echo "<script>location.href='../index.php';</script>";

}




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   
    
    <link rel="stylesheet" href="../CSS/bootstrap.min.css"/>

    <link rel="stylesheet" src="https://kit.fontawesome.com/0cac6245f1.js" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Ecomerce</title>
    <style>

    .imagecabecera{

        margin: 0 auto; 
    display: block; 
    border-radius: 50%;
     width: 100px;
      height: 100px; 
    }


    @media screen and (max-width: 600px) {
      
    .imagecabecera{
        width: 30px;
        height: 30px; 
}



    }

    </style>


</head>



<body >


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   
 

<script src="../JS/Perfil_index.js"></script>

<div class="container-fluid">
    <div class="row flex-nowrap">

        <div class="col-auto col-md-3 col-xl-2 px-sm-2  " style="background: purple;">
            <div style="margin-top: 30px">
       
             
                <a  >
                <img class="imagecabecera" id="txtimagen_cabecera" src="../Img/Usuarios_img/User_default.png" alt="profile_picture">
                <input type="hidden" class="form-control"  id="idusuario" value="<?php echo $idusuario;?>"   placeholder="Ingrese usuario">
              
                </a> 
                <div  style="  text-align:center;">
                    <a style="color: white;  text-align:center; width: 40px; " class="">
                        <span class="fs-6 d-none d-sm-inline" id="nombre"></span>
                        <br>
                        <span class="fs-10 d-none d-sm-inline" id="apellido"></span>
                    </a>
                </div>   
            </div>    
            <hr class="my-2" style="color: white;">

            <div  class="d-flex flex-column align-items-center align-items-sm-start  text-white min-vh-100">
               
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                      
                <li  class="nav-item">
                        <a style="color: white;" href="Perfil.php"  class="nav-link align-middle px-0">
                        <i class="fas fa-user-shield"></i><span class="ms-1 d-none d-sm-inline">Datos</span>
                        </a>
                    </li>

                    <li tyle="color: white;">
                                <a style="color: white;" href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fas fa-tasks"></i>
                                <span class="ms-1 d-none d-sm-inline">Pedidos</span></a>

                                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                    <a href="seccion/pedidos.php" class="nav-link px-0"> <span class="d-none d-sm-inline" style="margin-left: 20px;"></span> Ver pedidos</a>
                                
                                </li>
                                
                                </ul>
                    </li>
       

                    <li tyle="color: white;">
                        <a style="color: white;" href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fas fa-car-side"></i>
                         <span class="ms-1 d-none d-sm-inline">Envios</span></a>

                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                            <a href="seccion/medio_envio.php" class="nav-link px-0"> <span class="d-none d-sm-inline" style="margin-left: 20px;"></span> Medio envió</a>
                          </li>
                        
                        </ul>
                    </li>

                    <li tyle="color: white;">
                        <a style="color: white;" href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fas fa-box"></i>
                         <span class="ms-1 d-none d-sm-inline">Productos</span></a>

                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                            <a href="seccion/productos.php" class="nav-link px-0"> <span class="d-none d-sm-inline" style="margin-left: 20px;"></span> Productos</a>
                          </li>
                        </ul>
                    </li> 


                    <li tyle="color: white;">
                        <a style="color: white;" href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fas fa-question-circle"></i>
                         <span class="ms-1 d-none d-sm-inline">Ayuda</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
                            <li class="w-100">
                            <a href="seccion/contactar.php" class="nav-link px-0"> <span class="d-none d-sm-inline" style="margin-left: 20px;"></span> Contactar</a>
                          </li>
                        
                        </ul>
                    </li>
                    <li>
                        <a style="color: white;" href="seccion/salir.php" class="nav-link px-0 align-middle">
                        <i class="far fa-times-circle"></i>
                            <span class="ms-1 d-none d-sm-inline">Cerrar Sesión</span> </a>
                    
                    </li>
       
                    <li style="margin-top: 30px; ">
                    <a style="color: white;" href="../index.php" class="nav-link px-0 align-middle">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ms-1 d-none d-sm-inline">Volver</span>
                    </a>
                </li>
                </ul>
          
                
            </div>
        </div>

        
        <div class="col py-3">


