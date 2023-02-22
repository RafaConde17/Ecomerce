<?php include("../template/subcabecera.php"); ?>
<?php include('../Administrador/config/bd.php');  
$sentenciaSQL=$conexion->prepare("SELECT * FROM tbproducto");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$producto=(isset($_POST['producto']))?$_POST['producto']:"";
$precio=(isset($_POST['precio|']))?$_POST['precio']:"";
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
      $carrito_mio[]=array("txtID"=>$txtID,"producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad,"imagen"=>$imagen,"mediopago"=>0);	
    }
        
    $_SESSION['carrito']=$carrito_mio;
    header("Location: ".$_SERVER['HTTP_REFERER']."");
    break;
  }

?>

<div class="col-md-3 text-center" >
</div>

<div class="col-md-6 text-center" >
<div class="card pt-6"  >
        
<div class="text-center " Style="background: rgb(153,102,153);"  >

            <form  id="formulario" name="formulario"  method="POST"  >
            <h4 Style="color: white;  font-weight: bold;"  class="card-title" id="productos">Operacion Procesador</h4>
            <img class="rounded mx-auto d-block" width="300" id="" src="../Img/OpComplete.png" alt="">

                 <a class="link_add btn btn-primary " Style="color: white; margin-bottom: 10px; margin-top: 10px;"  href="<?php 
                 

              if( $_SESSION['tipousuario']=='1'){

                  echo "../Administrador/seccion/pedidos.php";

              }else if( $_SESSION['tipousuario']=='2'){

                  echo "../Afiliado/seccion/pedidos.php";
              }else if( $_SESSION['tipousuario']=='3'){

                  echo "../Cliente/seccion/pedidos.php";
              }
              
                 
                 
                 
                 
                 
                 ?>"  >Ver pedidos</a>
                 <a class="link_add btn btn-success " Style="color: white; margin-bottom: 10px; margin-top: 10px;"  href="../index.php"  >Cerrar</a>
                 
            </form>

            </div>  
    </div>

    </div>







  <?php include("../template/pie.php"); ?>