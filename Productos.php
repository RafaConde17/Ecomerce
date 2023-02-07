<?php include("template/cabecera.php"); ?>

<?php 
  if(isset($_POST["id_carrito"])){
    $id_carrito = $_POST["id_carrito"];
    $cantidad_carrito = $_POST["cantidad_carrito"];
    $producto_carrito = $_POST["producto_carrito"];
    $precio_carrito = $_POST["precio_carrito"];
    $imagen_carrito = $_POST["imagen_carrito"];
    $mediopago_carrito = $_POST["mediopago_carrito"];
    $Afiliado = $_POST['Variable_afiliado'];

    if(isset($_SESSION['carrito'])){

      $carrito_mio = $_SESSION['carrito'];
      if(isset($carrito_mio)){
        $cant = count($carrito_mio);
          foreach ($carrito_mio as $row){
            $val[] = $row['txtID'];
        } 
        $existencia=0;
          for($i =0 ; $i < $cant; $i++){
            if($id_carrito == $val[$i])
            {
              $existencia = 1;  
            }
          }
          if($existencia == 0){
            $carrito_mio[$cant]=array("txtID" => $id_carrito,
            "producto" => $producto_carrito,
            "precio" => $precio_carrito,
            "cantidad" => $cantidad_carrito,
            "imagen" => $imagen_carrito,
            "mediopago" => $mediopago_carrito);
          }  
      }
      $_SESSION['carrito']=$carrito_mio;
    }else{
      $carrito_mio[] = array("txtID" => $id_carrito,
      "producto" => $producto_carrito,
      "precio" => $precio_carrito,
      "cantidad" => $cantidad_carrito,
      "imagen" => $imagen_carrito,
      "mediopago" => $mediopago_carrito);
      $_SESSION['carrito']=$carrito_mio;
      $_SESSION['afiliado'] =$Afiliado;
    }
    header("Location:".$_SERVER['HTTP_REFERER']."");
  }
?>

<div class=container  >
  
    <div id="llenarlista_Productos">


    </div>
</div>


<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/modal_img.php"; ?>

  <?php include("template/pie.php"); ?>