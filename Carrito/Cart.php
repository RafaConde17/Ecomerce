
<?php 
include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/subcabecera.php";

?>


<?php  

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
 
    case "actualizar":

            //echo '<script language="javascript">alert("aaaa");</script>';
           $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
            $cantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
 
            $carrito_mio= $_SESSION['carrito'];
            $posicion;
            if(isset($carrito_mio))
            {
            if($cantidad!=0){
            for($i = 0; $i < count($carrito_mio);$i ++){
          
               if ($carrito_mio[$i]['txtID'] == $txtID ){
                        $posicion = $i;
               }
            }
           
            $carrito_mio[$posicion]['cantidad'] = $cantidad;
            $_SESSION['carrito'] = $carrito_mio;
      
            header("Location: ".$_SERVER['HTTP_REFERER']."");

            }
        }
        break;
         
    case "eliminar":
        $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
        $carrito_mio= $_SESSION['carrito'];
        $posicion;
        if(isset($carrito_mio))
        {
        for($i = 0; $i < count($carrito_mio);$i ++){
           if ($carrito_mio[$i]['txtID'] == $txtID ){
                    $posicion = $i;
           }
        }
    
        unset($carrito_mio[$posicion]);
        $carrito_mio =  array_values($carrito_mio);
   
        $_SESSION['carrito'] = $carrito_mio;
    
    }

    header("Location: ".$_SERVER['HTTP_REFERER']."");

     break;

    }



?>

<div class ="center mt-5"  >
    <div class="card pt-3"  Style="background: rgb(153,102,153);">
    <div class="text-center display-3" Style="color: white;  font-weight: bold; ">Mi Pedido </div>
    <div class="container-fluid p-2">

<table class="tabla text-center" Style="background: white;  "   >
 
<thead Style="background: white;  "  >
            <tr Style="background: white;   " >
                <th scope="col" Style="background: purple; color: white;">N°</th>
                <th scope="col" Style="background: purple; color: white;">Imagen</th>
                <th scope="col" Style="background: purple; color: white;">Cantidad</th>
                <th scope="col" Style="background: purple; color: white;">Producto</th>
                <th scope="col" Style="background: purple; color: white;">Precio</th>
                <th scope="col" Style="background: purple; color: white;">Total</th>
                <th scope="col" Style="background: purple; color: white;">Acciones</th>
        </tr>
</thead>

<tbody>
<div class ="container_card">
<?php 
if (isset($_SESSION['carrito'])){
  $carrito_mio= $_SESSION['carrito'];
  $total=0;

      for($i=0;$i<count($carrito_mio);$i++){
        if(isset($carrito_mio[$i])){
            if($carrito_mio[$i]!=NULL){

?>
<?php if($carrito_mio[$i]['txtID'] !=""){ ?>

<!-- MODAL CARRITO -->
<tr >

            <th scope="row" style="vertical-align: middle;"><?php echo ($i +1) ?> </th>
            <td>
                <img  src="../Img/Productos_img/<?php echo $carrito_mio[$i]['imagen'] ?>" alt="" width="100">
            </td>
            <td style="vertical-align: middle;" >
            <form id="form2" name="form1" method="POST">
                <input name="txtID" type="hidden" id="txtID" value="<?php echo $carrito_mio[$i]['txtID']; ?>" class="align-middle" />
                <?php echo($carrito_mio[$i]['mediopago']!=1)?"<input name='cantidad'  type='text' id='cantidad' style='width:50px;' class='align-middle text-center' value='" . $carrito_mio[$i]['cantidad'] . "' size='1' maxLength='4'/>" :"1" ?>  
                
                <?php echo($carrito_mio[$i]['mediopago']!=1)?"<button type='submit' name='accion'  value='actualizar' class='btn btn-warning'><i class='fas fa-sync'></i></button>  ":"" ?>  
            </form> 
            </td>
            <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['producto'] ?></td>
            <td style="vertical-align: middle;"><?php echo number_format($carrito_mio[$i]['precio'],2,",",".")  ?></td>
            <td style="vertical-align: middle;"><?php echo number_format(($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']),2,",","."); ?></td>    
            <td style="vertical-align: middle;">
            <form id="form3" name="form2" method="POST">
                <input name="txtID" type="hidden" id="txtID" value="<?php echo $carrito_mio[$i]['txtID']; ?>" class="align-middle" />
                <button type="submit"   name="accion"  value="eliminar" class="btn-lg bg-danger "><i class="fas fa-trash-alt"></i> </button>
            </form> 
                </td>
</tr>
<?php } ?>
<?php $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
            }
        }
    }
}
?>
</tbody>



</table>


                <li class="list-group-item d-flex justify-content-between  disabled">
                <span style="text-align:left; "><strong>Total S/.</strong></span>
                <strong style="text-align: left; "> <?php
                if(isset($_SESSION['carrito'])){
                    $total=0;
                    for($i=0;$i < count($carrito_mio);$i ++ ){
                        if(isset($carrito_mio[$i])){
                            if($carrito_mio[$i]!=NULL){
                                $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);

                            }


                        }
                    }
                }    
                if(!isset($total)){
                    $total='0';
                }else{
                    $total=$total;
                }
                echo number_format($total,2,",","."); ?> Soles </strong>
                </li>
</div>
</div>

<a type="button"  style="float: right;" class="btn btn-success my-4" href="../Detallepago/detalle_pago.php">Continuar Pedido</a>
<a type="button"  style="float: left;" class="btn btn-success my-4" href="../MedioEnvio/Medio_Envio.php">Regresar</a>

</div>

</div>

<!-- END MODAL CARRITO -->
<?php include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/pie.php";
?>