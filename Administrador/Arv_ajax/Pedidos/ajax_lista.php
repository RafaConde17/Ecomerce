<?php
include "../../config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'lista')
    { 
        try {
            $sentenciaSQL=$conexion->prepare(" SELECT 
            tbpedido.*, tbusuarios.*, 
            tbpedidodatos.*, tbpedidocliente.*, 
            sum(tbpedidodatos.cantidad) as Can_Articulos, 
            tbusuarios.usuario as User,
            tbpedido.ref as referencia
            FROM tbpedido 
            INNER JOIN tbusuarios on tbusuarios.idusuario = tbpedido.usuario
            INNER JOIN tbpedidodatos on tbpedidodatos.ref = tbpedido.ref
            INNER JOIN tbpedidocliente on tbpedidocliente.ref = tbpedido.ref
            GROUP BY tbpedido.ref
            ORDER BY User   " );
            
            $sentenciaSQL->execute();
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result)>0){
                $count=1;
                        foreach($result as $row ){
                            $json[] =array(
                                'valor' => $count,
                                'id' => filter_var($row['id'], FILTER_SANITIZE_NUMBER_INT),
                                'usuario'=> filter_var($row['User'],FILTER_SANITIZE_STRING),
                                'ref' => filter_var($row['referencia'], FILTER_SANITIZE_STRING),
                                'Can_Articulos' => filter_var($row['Can_Articulos'],FILTER_SANITIZE_NUMBER_INT),
                                'medio' => filter_var($row['medio'],FILTER_SANITIZE_STRING),
                                'estadopago' => filter_var($row['estadopago'], FILTER_SANITIZE_STRING),
                                'total' => number_format(filter_var($row['total'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'fecha' => filter_var($row['fecha'], FILTER_SANITIZE_STRING)
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
