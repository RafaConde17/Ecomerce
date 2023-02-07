
<?php 



include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/subcabecera.php";

include('../Administrador/config/bd.php');

$fecha = new Datetime();

$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$apellidos=(isset($_POST['apellidos']))?$_POST['apellidos']:"";
$direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
$telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
$totalfinal=(isset($_POST['totalfinal']))?$_POST['totalfinal']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";






switch($accion){
        case "agregar":
            if(isset($_SESSION['idusuario'])){
                $datousuario = $_SESSION['idusuario'];
                if(isset($_SESSION['carrito'])){
                    $carrito_mio = $_SESSION['carrito'];
                                if(isset($datousuario)){
                                            if(isset($carrito_mio)){   

                                                          
                                                $medio="";
                                                $posicionmediopago; 
                                                $cantidad = count($carrito_mio);
                                                            for($j=0; $j < $cantidad;$j ++){

                                                                if($carrito_mio[$j]['mediopago']==1){
                                                                    $posicionmediopago = $j;
                                                                }  
                                                            }
                                                            if(isset($posicionmediopago)){

                                                            $medio=$carrito_mio[$posicionmediopago]['producto'];
                                                            
                                                            }

                                                            if($medio!=""){
                                                                $sentenciaSQL=$conexion->prepare("SELECT * FROM tbpedido");
                                                                $sentenciaSQL->execute();
                                                                $listapedidocliente=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                                                           
                                                                if((count($listapedidocliente)==0)){
                                                                      $indice= 1;
                                                                      $ref=$fecha->getTimestamp()."_".$indice;
                                                                }else{
                                                                      $sentenciaSQL=$conexion->prepare("SELECT id  FROM tbpedido ORDER BY id DESC LIMIT 1 ");
                                                                      $sentenciaSQL->execute();
                                                                      $listapedidosclientesID=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                                                                      if($listapedidosclientesID!=""){
                                                                      $ref=$fecha->getTimestamp()."_".($listapedidosclientesID['id'] + 1);
                                                                      }
                                                                } 
                                                                
                                                                $fechaActual = date('y/m/d');

                                                                $estado=1;    
                                                        
      
                                                                $sentenciaSQL=$conexion->prepare("INSERT INTO tbpedidocliente( ref, usuario,nombre, apellidos, direccion, telefono, fecha, estado)
                                                                VALUES (:p_ref,:p_usuario,:p_nombre,:p_apellidos,:p_direccion,:p_telefono,:p_fecha,:p_estado)");
                                                                $sentenciaSQL->bindParam(':p_ref',$ref);
                                                                $sentenciaSQL->bindParam(':p_usuario',$datousuario);
                                                                $sentenciaSQL->bindParam(':p_nombre',$nombre);
                                                                $sentenciaSQL->bindParam(':p_apellidos',$apellidos);
                                                                $sentenciaSQL->bindParam(':p_direccion',$direccion);
                                                                $sentenciaSQL->bindParam(':p_telefono',$telefono);
                                                                $sentenciaSQL->bindParam(':p_fecha',$fechaActual);
                                                                $sentenciaSQL->bindParam(':p_estado',$estado);
                                                                $sentenciaSQL->execute(); 
      
                                                                  // ALTER TABLE tu_tabla_va_aqui AUTO_INCREMENT = 1
                                                                
                                                             
                                                                
                                                                for($i=0; $i < $cantidad; $i ++){

                                                                $total = $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];

                                                                $sentenciaSQL=$conexion->prepare("INSERT INTO tbpedidodatos( ref, usuario,cantidad,imagen, articulos, precio, total, fecha, estado)
                                                                VALUES (:p_ref,:p_usuario,:p_cantidad, :p_imagen , :p_articulos,:p_precio,:p_total,:p_fecha,:p_estado)");
                                                                $sentenciaSQL->bindParam(':p_ref',$ref);
                                                                $sentenciaSQL->bindParam(':p_usuario',$datousuario);
                                                                $sentenciaSQL->bindParam(':p_cantidad',$carrito_mio[$i]['cantidad']);
                                                                $sentenciaSQL->bindParam(':p_imagen',$carrito_mio[$i]['imagen']);
                                                                $sentenciaSQL->bindParam(':p_articulos',$carrito_mio[$i]['producto']);
                                                                $sentenciaSQL->bindParam(':p_precio',$carrito_mio[$i]['precio']);
                                                                $sentenciaSQL->bindParam(':p_total',$total);
                                                                $sentenciaSQL->bindParam(':p_fecha',$fechaActual);
                                                                $sentenciaSQL->bindParam(':p_estado',$estado);
                                                                $sentenciaSQL->execute(); 

                                                                }


                                                                
                                                                $sentenciaSQL=$conexion->prepare("SELECT *  FROM tbusuarios  where idusuario  = :id  LIMIT 1 ");
                                                                $sentenciaSQL->bindParam(':id',$_SESSION['afiliado']);
                                                                $sentenciaSQL->execute();
                                                                
                                                                $lista_afiliado=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                                                               
                                                                if($lista_afiliado!=""){
                                                                $afiliado= $lista_afiliado['NameTienda'] ;
                                                                }  



                                                                $cliente = $nombre . " ". $apellidos;
                                                                $estadopago="Pendiente de pago";
                                                             
      
                                                                
                           
                                                                $totalfinal = str_replace(',', '.', $totalfinal);
                                                                $totalfinal = floatval($totalfinal);
                                                                 
                                                                
                                                                $sentenciaSQL=$conexion->prepare("INSERT INTO tbpedido( ref, usuario,cliente, afiliado, estadopago, medio, total, fecha, estado)
                                                                VALUES (:p_ref,:p_usuario,:p_cliente,:p_afiliado,:p_estadopago,:p_medio,:p_total,:p_fecha,:p_estado)");
                                                                $sentenciaSQL->bindParam(':p_ref',$ref);
                                                                $sentenciaSQL->bindParam(':p_usuario',$datousuario);
                                                                $sentenciaSQL->bindParam(':p_cliente',$cliente);
                                                                $sentenciaSQL->bindParam(':p_afiliado',$afiliado);
                                                                $sentenciaSQL->bindParam(':p_estadopago',$estadopago);
                                                                $sentenciaSQL->bindParam(':p_medio',$medio);
                                                                $sentenciaSQL->bindParam(':p_total', $totalfinal);
                                                                $sentenciaSQL->bindParam(':p_fecha',$fechaActual);
                                                                $sentenciaSQL->bindParam(':p_estado',$estado);
                                                                $sentenciaSQL->execute(); 
      
                                                                unset($_SESSION['carrito']);
                                                              
                                                             header("Location:../Detallepago/pagoaceptado.php");       
      
                                                          }else{
                                                              echo '<script language="javascript">alert("No se Medio de envió");</script>';
                                                          }   

                                                   
                                            }

                                }
                }else{
                    echo '<script language="javascript">alert("No se encontraron productos");</script>';
                }

            }else {
                echo '<script language="javascript">alert("No se Inicio sesión correctamente");</script>';
                
            }
           
        break;
        }

?>




<div class ="center mt-1"  >
    <div class="card pt-3"  Style="background: rgb(153,102,153);">
                            <div class="text-center display-3" Style="color: white;  font-weight: bold; ">Detalle de Pedido 
                            </div>
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
                                                    <?php if($carrito_mio[$i]['txtID'] !=''){ ?>

                                        <!-- MODAL CARRITO -->
                                                                <tr >

                                                                            <th scope="row" style="vertical-align: middle;"><?php echo ($i +1) ?> </th>
                                                                            <?php
                
                                                                            $ruta1 = "../Img/Productos_img/" . $carrito_mio[$i]['imagen'];
                                                                            $ruta2 = "../Img/Medio_Envio/" . $carrito_mio[$i]['imagen'];
                                                                            
                                                                            if (file_exists($ruta1)) {
                                                                                $imagen = $ruta1;
                                                                                } else {
                                                                                $imagen = $ruta2;
                                                                                }?>
                                                                          
                                                                            
                                                                            <td>  <img  src="<?php echo $imagen ?>" alt="" width="100"></td>
                                                                            <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['cantidad'] ?></td>                                          
                                                                            <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['producto'] ?></td>
                                                                            <td style="vertical-align: middle;"><?php echo number_format($carrito_mio[$i]['precio'],2,",",".")  ?></td>
                                                                            <td style="vertical-align: middle;"><?php echo number_format(($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']),2,",","."); ?></td>    
                                                                
                                                                </tr>
                                                    <?php } ?>
                                                    <?php $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                        </div>
                                        </tbody>



                            </table>

                            <li class="list-group-item d-flex justify-content-between  disabled">
                                    <span style=" color: #000000;">
                                            <strong>Sub Total
                                            </strong>
                                    </span>
                                    <span style=" color: #000000;">
                                            <strong >S/. <?php
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
                                            echo number_format($total,2,",","."); ?> 
                                        
                                            </strong>
                                    </span >
                            </li>

                            <li class="list-group-item d-flex justify-content-between  disabled">
                                    <span style=" color: #000000;"><strong>I.V.A </Strong> </span>
                                    <span style=" color: #000000;" class="grey-text font-weight-bold" style="font-size: 14px;">
                                            <strong>S/. 
                                            <?php
                                            $totaliva = $total*0.18;
                                            echo number_format($totaliva,2,",",".");
                                            ?> 
                                            </strong>
                                    </span>

                            </li>

                            <li class="list-group-item d-flex justify-content-between  disabled">
                                        <span style=" color: #000000;">
                                        <strong>Total: </Strong> 
                                        </span>
                                        <span style=" color: #000000;" class="grey-text font-weight-bold" style="font-size: 14px;">
                                                    <strong>S/. 
                                                    <?php

                                                    $totalfinal =  $total+$totaliva ;
                                                    echo number_format($totalfinal,2,",",".");
                                                    ?> 
                                                    </strong>
                                        </span>

                            </li>

                            <hr>

                            <div class="container p-5"  style=" background-color: white;">

                                                <form  class="row g-3 " method="POST" >

                                                            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;"> Datos de Envió </p>

                                                            <div class="col-md-4">                                               
                                                            <label for="validationCustom01" class="form-label">Nombres:</label>
                                                            <input type="text" autofocus  class="form-control" id="nombre" title="Dato obligatorio" name="nombre"  required>
                                                            </div>

                                                            <div class="col-md-4">
                                                            <label for="validationCustom02" class="form-label">Apellidos:</label>
                                                            <input type="text" class="form-control" id="apellidos"  title="Dato obligatorio" name="apellidos"  required>
                                                             
                                                            </div>

                                                            <div class="col-md-4">
                                                            <label for="validationCustom04" class="form-label">Teléfono:</label>
                                                            <input type="number" class="form-control" id="telefono"  title="Dato obligatorio" name="telefono"  required>
                                                            </div>

                                                            <div class="col-md-12">
                                                            <label for="validationCustom03" class="form-label">Dirección:</label>
                                                            <input type="text" class="form-control" id="direccion"  title="Dato obligatorio" name="direccion" required> </input>
                                                        
                                                            </div>

                                                            <input type="hidden" class="form-control" id="totalfinal"  value="<?php echo number_format($totalfinal,2,",","."); ?>" name="totalfinal"  required>
                                                            <div class="col-md-12" style="text-align:center; ">
                                                            <button  type="submit" name="accion"  value="agregar" class="btn btn-success ">Pagar y Finalizar</button> 
                                                            </div>

                                                </form>

                            </div>

                </div>
    </div>


    <a type="button"   class="btn btn-success my-4" href="../Carrito/cart.php">Regresar</a>

</div>





<!-- END MODAL CARRITO -->
<?php include $_SERVER['DOCUMENT_ROOT']."/Ecomerce/Template/pie.php";
?>