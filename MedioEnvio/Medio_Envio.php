
<?php 
include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/subcabecera.php";



if(isset($_POST["id_carrito"])){

        $id_carrito = $_POST["id_carrito"];
        $cantidad_carrito = $_POST["cantidad_carrito"];
        $producto_carrito = $_POST["producto_carrito"];
        $precio_carrito = $_POST["precio_carrito"];
        $imagen_carrito = $_POST["imagen_carrito"];
        $mediopago_carrito = $_POST["mediopago_carrito"];

        if(isset($_SESSION['carrito'])){
          $carrito_mio = $_SESSION['carrito'];
          if(isset($carrito_mio)){

            $cant = count($carrito_mio);


           foreach ($carrito_mio as $row){
                $id[] = $row['txtID'];
                $mediopago[] = $row['mediopago'];
            } 

            $existencia=0;
            $agreado = 0 ;
            $posicion =0 ;
          

              for($i =0 ; $i < $cant; $i++){

                if($mediopago[$i] == 1)
                {
                  $agreado = 1;  
                  $posicion = $i;
                }
              }

              if($agreado == 0){
                      
                $carrito_mio[$cant]=array("txtID" => $id_carrito,
                "producto" => $producto_carrito,
                "precio" => $precio_carrito,
                "cantidad" => $cantidad_carrito,
                "imagen" => $imagen_carrito,
                "mediopago" => $mediopago_carrito);

                echo "<script>alert('Item agregado');</script>";

              } else{

                $carrito_mio[$posicion]=array("txtID" => $id_carrito,
                "producto" => $producto_carrito,
                "precio" => $precio_carrito,
                "cantidad" => $cantidad_carrito,
                "imagen" => $imagen_carrito,
                "mediopago" => $mediopago_carrito);

                echo "<script>alert('Item actualizado');</script>";
              }
          }

          $_SESSION['carrito']=$carrito_mio;

        }else{
                echo "<script>alert('Primero ingrese productos');</script>";
        }


      
        header("Refresh:0");

      }


?>
<script src="../JS/medio_envio.js"> </script>

<div class ="center mt-2"  >
    <div class="card pt-3"  Style="background: rgb(153,102,153);">
                <div class="text-center display-2" Style="color: white;  font-weight: bold; ">Selecciona tipo de Envio </div>
                                <div class="container-fluid p-2">
                                          <div class=container  >
                                                  <div id="llenarlista_medio">


                                                  </div>
                                                  <a type="button"  style="float: right;" class="btn btn-success my-4" href="../Carrito/Cart.php">Continuar Pedido</a>
                                                  <a type="button"  style="float: left;" class="btn btn-success my-4" href="../index.php">Regresar</a>

                                          </div>
                                        

                                </div>
                        </div>
                  </div>
      </div

<?php include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/pie.php";
?>