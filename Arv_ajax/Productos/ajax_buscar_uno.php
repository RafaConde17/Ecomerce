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
            