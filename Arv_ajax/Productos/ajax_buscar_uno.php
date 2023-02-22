<?php 

include "../../Administrador/config/bd.php";


if(!empty($_POST)){
        
    if($_POST['action'] == 'ver')
    { 
        $id= $_POST['id'];

            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbproducto 
                                                INNER JOIN tbcategoria_producto on tbcategoria_producto.id_categoriapro  = tbproducto.idcategoria 
                                                INNER JOIN tbestado on tbestado.idestado = tbproducto.estado 
                                                INNER JOIN tbusuarios on tbusuarios.idusuario  = tbproducto.idusuario 
                                                where tbproducto.estado  = '1' and tbproducto.idproducto = :dato1
                                                ORDER BY producto ASC");
            $sentenciaSQL->bindParam(':dato1', $id);
            $sentenciaSQL->execute();

            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
                if($result !=""){
                                $idproducto= $result['idproducto'];
                                $producto= $result['producto'];
                                $idcategoria= $result['categoria'];
                                $subcategoria= $result['subcategoria'];
                                $descripcion= $result['descripcion'];
                                $cantidad= $result['cantidad'];
                                $precio= $result['precio'];
                                $imagen= $result['imagen'];
                                $estado= $result['detalleestado'];
                        
                                $response = array(
                                'idproducto'=>filter_var($idproducto, FILTER_SANITIZE_NUMBER_INT),
                                'producto' =>filter_var( $producto,FILTER_SANITIZE_STRING),
                                'idcategoria'=>filter_var($idcategoria,FILTER_SANITIZE_STRING),
                                'subcategoria' => filter_var($subcategoria,FILTER_SANITIZE_STRING),
                                'descripcion'=>filter_var($descripcion,FILTER_SANITIZE_STRING),
                                'cantidad' => filter_var($cantidad, FILTER_SANITIZE_NUMBER_INT),
                                'precio' => number_format(filter_var($precio,FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'imagen' => filter_var($imagen,FILTER_SANITIZE_STRING),
                                'estado'=>filter_var($estado,FILTER_SANITIZE_STRING)
                
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
            