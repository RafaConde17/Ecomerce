<?php
include "../../config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'seleccionar')
        { 
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM `tbproducto` 
            WHERE idproducto   = :p_id");

            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $idproducto= $result['idproducto'];
                         $producto= $result['producto'];
                         $idcategoria= $result['idcategoria'];
                         $subcategoria= $result['subcategoria'];
                         $descripcion= $result['descripcion'];
                         $cantidad= $result['cantidad'];
                         $precio= $result['precio'];
                         $imagen= $result['imagen'];
                         $estado= $result['estado'];
                   


                         $response = array(
                            'idproducto'=>$idproducto,
                            'producto' => $producto,
                            'idcategoria'=>$idcategoria,
                            'subcategoria' => $subcategoria,
                            'descripcion'=>$descripcion,
                            'cantidad' => $cantidad,
                            'precio'=>$precio,
                            'imagen' => $imagen,
                            'estado'=>$estado
                        
                        );
                        $jsonstring = json_encode($response);
                        echo $jsonstring;
                        exit;
                        // Close Connection
                        $conexion = null;
            }
            echo 'error';
            exit;
    }
   

}
exit;

?>