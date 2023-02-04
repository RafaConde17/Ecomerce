<?php
include "../../../Administrador/config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'lista')
    { 
        $idusuario = $_POST['id'];

        if($idusuario ==""){
            echo json_encode(["error" => "No se encontraron resultados"]);
            exit;

        }

        try {
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbproducto 
                                                INNER JOIN tbcategoria_producto on tbcategoria_producto.id_categoriapro  = tbproducto.idcategoria 
                                                INNER JOIN tbestado on tbestado.idestado = tbproducto.estado 
                                                INNER JOIN tbusuarios on tbusuarios.idusuario  = tbproducto.idusuario 
                                                where tbproducto.idusuario = :dato1
                                                ORDER BY producto ASC");

            $sentenciaSQL->bindParam(':dato1', $idusuario);                                    
            $sentenciaSQL->execute();
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result)>0){
                $count=1;
                foreach($result as $row ){
                    $json[] =array(
                        'valor' => $count,
                        'idproducto' => filter_var($row['idproducto'], FILTER_SANITIZE_NUMBER_INT),
                        'producto'=> filter_var($row['producto'],FILTER_SANITIZE_STRING),
                        'idcategoria' => filter_var($row['categoria'], FILTER_SANITIZE_STRING),
                        'subcategoria' => filter_var($row['subcategoria'],FILTER_SANITIZE_STRING),
                        'descripcion' => filter_var($row['descripcion'],FILTER_SANITIZE_STRING),
                        'cantidad' => filter_var($row['cantidad'], FILTER_SANITIZE_NUMBER_INT),
                        'precio' => number_format(filter_var($row['precio'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                        'imagen' => filter_var($row['imagen'],FILTER_SANITIZE_STRING),
                        'estado' => filter_var($row['detalleestado'], FILTER_SANITIZE_STRING)
                        );
                    $count++;
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
                exit;
            } else {
                echo json_encode(["error" => "No se encontraron resultados"]);
                exit;
            }
        } catch(PDOException $e) {
            echo json_encode(["error" => $e->getMessage()]);
            exit;
        }
    }
}
?>
