<?php 

include "../Administrador/config/bd.php";

if(!empty($_POST)){

    if($_POST['action'] == 'infoProducto')
    {          
            $producto_id= $_POST['producto'];
            $estado = 1;
            $sentenciaSQL = $conexion->prepare("SELECT * FROM tbproducto INNER JOIN tbcategoria_producto ON tbcategoria_producto.id_categoriapro = tbproducto.idcategoria 
            inner join tbestado on tbestado.idestado = tbproducto.estado where tbproducto.idproducto = :ide and tbproducto.estado = :iestado");
            $sentenciaSQL->bindParam(':ide',$producto_id);
            $sentenciaSQL->bindParam(':iestado',$estado);
            $sentenciaSQL->execute();
            $result =$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        
            if($result !=""){

            $id= $result['idproducto'];
            $product= $result['producto'];
            $categoria= $result['categoria'];
            $subcategoria= $result['subcategoria'];
            $detalleestado= $result['detalleestado'];

            $descripcion= $result['descripcion'];
            $cantidad= $result['cantidad'];
            $precio= $result['precio'];
            $imagen= $result['imagen'];

           // $listajson='{ idproducto: '.$id . ',producto: '. $product .' }' ;         
           // $json =  '{idproducto:'.$id.',producto:'.$product.'}';          
                
            //print_r ($listajson);
            $json = '{"idproducto":"'. $id .'","producto":"' . $product . '","categoria":"' . $categoria . '","subcategoria":"' . $subcategoria . '","detalleestado":"' . $detalleestado . '","descripcion":"' . $descripcion . '","cantidad":' . $cantidad . ',"precio":"' . $precio . '","imagen":"' . $imagen . '"}';
            echo ($json);
          //  var_dump(json_decode($json));
           // var_dump(json_decode($json, true));
            //print_r( json_decode(json_encode($list),true));
           
            exit;
            
            }
            echo 'error';
            exit;
    }
   

}
exit;
?>