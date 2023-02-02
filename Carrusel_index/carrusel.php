
<?php  
 include('Administrador/config/bd.php');  
$sentenciaSQL=$conexion->prepare("SELECT * FROM tbproducto");
$sentenciaSQL->execute();
$resultado=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$producto=(isset($_POST['producto']))?$_POST['producto']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
$imagen=(isset($_POST['imagen']))?$_POST['imagen']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


switch($accion){
    case "agregar":

    if(isset($_SESSION['carrito'])){
      $carrito_mio = $_SESSION['carrito'];

      if(isset($txtID)){
        $cant = count($carrito_mio);

        foreach ($carrito_mio as $row){
            $val[] = $row['txtID'];
        } 
 
        
        $existencia=0;
          for($i =0 ; $i < $cant; $i++){
            if($txtID == $val[$i])
            {
              $existencia = 1;  
            }
                
          }


          if($existencia == 0){
            $carrito_mio[$cant]=array("txtID"=>$txtID,"producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad ,"imagen"=>$imagen,"mediopago"=>0);	
          }  

      }
    }else{
      $txtID=$_POST['txtID'];
      $producto=$_POST['producto'];
      $precio=$_POST['precio'];
      $cantidad=$_POST['cantidad'];
      $carrito_mio[]=array("txtID"=>$txtID,"producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad,"imagen"=>$imagen,"mediopago"=>0);	
    }
        
    $_SESSION['carrito']=$carrito_mio;

    header("Location: ".$_SERVER['HTTP_REFERER']."");
   break;
  
 
  }


?>

<div class="content-all">
        <div class="content-carrousel">
                        <?php
                          $contador = 0;
                          $aumento=0;
                        
                            foreach ($resultado as $row){
                              
                              echo "<figure >";
                              echo "<p class='' Style='color: white;  font-weight: bold;'>". $row['producto'] ."</p>";
                              echo "<img src='Img/Productos_img/".$row['imagen']."' style='padding-left:". 5 ."%; padding-right:". 5 ."%;'   width='60%' height='50%' >";
                              echo "<br>";
                              echo "<div class='row justify-content-center'>";
                              echo "<form  id='formulario' name='formulario'  method='POST'>";

                              echo "<input type='hidden' value='". $row['idproducto'] ."' name='txtID' id='txtID' >";
                              echo "<input type='hidden' value='". $row['producto'] ."' name='producto' id='producto' >";
                              echo "<input type='hidden' value='". $row['precio'] ."' name='precio' id='precio' >";
                              echo "<input type='hidden' value='". $row['imagen'] ."' name='imagen' id='imagen' >";
                              echo "<input type='hidden'  name='cantidad' id='cantidad' value='1' >";
                              echo "<br>";
                              echo "<button type='submit' name='accion'  value='agregar' class='btn btn-warning '><i class='fas fa-shopping-cart'></i>Add Cart</button>";
                              
                              echo "</div>";
                              echo "</form>";
                              echo "</figure>";
                            }  
                           ?>
     
</div>
</div>
        
         

