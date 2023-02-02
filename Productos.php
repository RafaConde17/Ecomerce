<?php include("template/cabecera.php"); ?>

<?php include('Administrador/config/bd.php');  
$sentenciaSQL=$conexion->prepare("SELECT * FROM tbproducto");
$sentenciaSQL->execute();
$listaproductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$producto=(isset($_POST['producto']))?$_POST['producto']:"";
$precio=(isset($_POST['precio']))?$_POST['precio']:"";
$cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
$imagen=(isset($_POST['imagen']))?$_POST['imagen']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//echo $txtID."<br/>";
//echo $producto."<br/>";
//echo $precio."<br/>";
//echo $cantidad."<br/>";
//echo $accion."<br/>";
switch($accion){
 
    case "agregar":

      if(isset($_SESSION['carrito'])){
        $carrito_mio = $_SESSION['carrito'];
        if(isset($carrito_mio)){

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


        $_SESSION['carrito']=$carrito_mio;

      }else{
        $carrito_mio[]=array("txtID"=>$txtID,"producto"=>$producto,"precio"=>$precio,"cantidad"=>$cantidad,"imagen"=>$imagen,"mediopago"=>0);	

        $_SESSION['carrito']=$carrito_mio;
      }
          
     


     // print_r($_SESSION['carrito']);
      header("Location: ".$_SERVER['HTTP_REFERER']."");

    break;
  }

?>

<?php  foreach ($listaproductos as $productos){ ?>
  
<div class="col-md-4" style="margin-top: 10px" >
    <div class="card">
        <img class="card-img-top" id="" src="Img/Productos_img/<?php echo $productos['imagen']; ?>" alt="">
        
        <div class="card-body ">

            <form  id="formulario" name="formulario"  method="POST"  >
              
            <h4  class="card-title" ><?php echo $productos['producto']; ?></h4>
            <p class="card-text" ><?php  echo number_format($productos['precio'],2,",",".");  ?></p>
            
            <input type="hidden" value="<?php echo $productos['imagen']; ?>" name="imagen" id="imagen" >
            <input type="hidden" value="<?php echo $productos['idproducto']; ?>" name="txtID" id="txtID" >
            <input type="hidden" value="<?php echo $productos['producto']; ?>" name="producto" id="producto" >
            <input type="hidden" value="<?php echo $productos['precio']; ?>" name="precio" id="precio" >
            <input type="hidden"  name="cantidad" id="cantidad " value="1" >
            
                 <a  class="link_add btn btn-success ver_produc "  product="<?php echo $productos['idproducto'];?>"   >Ver</a>
                 <button type="submit"   name="accion"  value="agregar" class="btn btn-warning "><i class="fas fa-shopping-cart"></i>Add car</button>
                 
            </form>

            </div>  
    </div>
</div>

<?php } ?>


<script src="JS/comandos.js"> </script>
<?php  include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/modal_img.php"; ?>

  <?php include("template/pie.php"); ?>