<?php
include "../../../Administrador/config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'lista')
    {  

        $id = $_POST['id'];
             try {
    
            
            $sentenciaSQL=$conexion->prepare("SELECT
             tbpedido.id as id_pedido, 
             tbusuarios.usuario as User,
             tbpedido.ref as referencia,
             sum(tbpedidodatos.cantidad) as Can_Articulos, 
             tbpedido.estadopago as estadopago_pedido,
               tbpedido.afiliado as tienda,
                sum(tbpedidodatos.precio * tbpedidodatos.cantidad) as precioproducto, 
                (sum(tbpedidodatos.precio * tbpedidodatos.cantidad) *0.18) as IVA, 
                tbpedido.total as TotalMonto,
                 tbpedido.fecha as fecha_pedido
                 FROM tbpedido INNER JOIN tbusuarios 
                 on tbusuarios.idusuario = tbpedido.usuario 
                 INNER JOIN tbpedidodatos 
                 on tbpedidodatos.ref = tbpedido.ref 
                 INNER JOIN tbpedidocliente 
                 on tbpedidocliente.ref = tbpedido.ref 
                 where  tbpedido.usuario= :p_dato1
                 GROUP BY tbpedido.ref 
                 ORDER BY fecha_pedido desc  " );

            $sentenciaSQL->bindParam(':p_dato1', $id);
            $sentenciaSQL->execute();
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


            if(count($result)>0){
                $count=1;
                        foreach($result as $row ){
                            $json[] =array(
                                'valor' => $count,
                                'id' => filter_var($row['id_pedido'], FILTER_SANITIZE_NUMBER_INT),
                                'usuario'=> filter_var($row['User'],FILTER_SANITIZE_STRING),
                                'ref' => filter_var($row['referencia'], FILTER_SANITIZE_STRING),
                                'Can_Articulos' => filter_var($row['Can_Articulos'],FILTER_SANITIZE_NUMBER_INT),
                                'tienda' => filter_var($row['tienda'],FILTER_SANITIZE_STRING),
                                'estadopago' => filter_var($row['estadopago_pedido'], FILTER_SANITIZE_STRING),
                                'IVA' => number_format(filter_var($row['IVA'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'precioproducto' => number_format(filter_var($row['precioproducto'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'total' => number_format(filter_var($row['TotalMonto'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'fecha' => filter_var($row['fecha_pedido'], FILTER_SANITIZE_STRING)
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
