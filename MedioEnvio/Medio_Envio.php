
<?php 
include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/subcabecera.php";

include('../Administrador/config/bd.php');  
$sentenciaSQL=$conexion->prepare("SELECT * FROM tbmediodeenvio");
$sentenciaSQL->execute();
$resultado=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$producto=(isset($_POST['producto']))?$_POST['producto']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
$imagen=(isset($_POST['imagen']))?$_POST['imagen']:"";
$respuesta ="";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


if(($_SESSION['tipo']=="")){
  
 header('Location:../Administrador/index.php');

}


switch($accion){

    case "agregar":
      
     if(isset($_SESSION['carrito'])){   
      $carrito_mio = $_SESSION['carrito'];

          if(isset($carrito_mio)){
                     
                    
                      if(isset($txtID)){
                        $cant = count($carrito_mio);

                        foreach ($carrito_mio as $row){
                            $val[] = $row['mediopago'];
                        } 
                        $existencia=0;
                          for($i =0 ; $i < $cant; $i++){
                            if( $val[$i]==1)
                            {
                              $existencia = 1;  
                            }
                          }

                          if($existencia == 0){
                            $carrito_mio[$cant]=array("txtID"=>$txtID,"producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad ,"imagen"=>$imagen,"mediopago"=>1);	
                            $respuesta= "</br> Alerta: se agrego medio de envio";
                        }else{
                            $respuesta= "</br> Alerta: Ya existe medio de envio";
                          } 
                      }
                    }
                        
                    $_SESSION['carrito']=$carrito_mio;
     }else{

        $respuesta= "</br> Alerta: No se asignaron productos al carrito";
     }
   break;
  
 
  }


?>


<?php include('../Administrador/config/bd.php');  

$sentenciaSQL=$conexion->prepare("SELECT * FROM tbmediodeenvio");
$sentenciaSQL->execute();
$listamedioenvio=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

 
<div class ="center mt-2"  >
    <div class="card pt-3"  Style="background: rgb(153,102,153);">
    <div class="text-center display-2" Style="color: white;  font-weight: bold; ">Selecciona tipo de Envio </div>
    <div class="text-center" Style="color: white;  font-weight: bold; "><?php echo $respuesta ?> </div>
    <div class="container-fluid p-2">
        <div class=container>
                <br/>
                <div class="row">
                        <?php  foreach ($listamedioenvio as $medioenvio){ ?>
                                <div class="col-md-4" >
                                    <div class="card">
                                           
                                            <div class="card-body ">
                                              
                                              <form  id="formulario" name="formulario"  method="POST"  >
                                                <h4  class="card-title" Style=" text-align: center;" id=""><?php echo $medioenvio['medioenvio']; ?></h4>
                                                <img class="card-img-top" id="" src="../Img/Medio_Envio/<?php echo $medioenvio['imagen_m_envio']; ?>" alt="">
                                              
                                                <p class="card-text"  Style=" text-align: center; font-weight: bold;" id="">S/. <?php echo number_format($medioenvio['precio_m_envio'],2,",","."); ?></p>
                                                <p class="card-text"  Style=" text-align: center;" id=""><?php echo $medioenvio['descripcion_m_envio']; ?></p>
                                                <input type="hidden" value="<?php echo $medioenvio['imagen_m_envio']; ?>" name="imagen" id="imagen" >
                                                <input type="hidden" value="<?php echo $medioenvio['idmedioenvio']; ?>" name="txtID" id="txtID" >
                                                <input type="hidden" value="<?php echo $medioenvio['medioenvio']; ?>" name="producto" id="producto" >
                                                <input type="hidden" value="<?php echo  $medioenvio['precio_m_envio']; ?>" name="precio" id="precio" >
                                                <input type="hidden"  name="cantidad" id="cantidad " value="1" >
                                                    <div  Style=" text-align: center;">
                                                    <button type="submit"   name="accion"  value="agregar" class="btn btn-warning "><i class="fas fa-shopping-cart"></i>Add car</button>
                                                    </div>
                                                  </form>
                                            </div>  
                                    </div>
                                </div>

                        <?php } ?>
                </div>
                <a type="button"  style="float: right;" class="btn btn-success my-4" href="../Carrito/Cart.php">Continuar Pedido</a>
                <a type="button"  style="float: left;" class="btn btn-success my-4" href="../index.php">Regresar</a>

        </div>
             

</div>
</div>
</div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/pie.php";
?>