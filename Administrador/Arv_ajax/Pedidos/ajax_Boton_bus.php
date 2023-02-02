<?php
include "../../config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'buscar')
    { 
        try {
           
            $condicion= isset($_POST['condicion']) ? $_POST['condicion'] : '';
            $id1= isset($_POST['text1']) ? $_POST['text1'] : '';
            $id2= isset($_POST['text2']) ? $_POST['text2'] : '';
  
            if(empty($condicion) || empty($id1)  ){
                $response['resultado'] = 'Por favor complete todos los campos';
                echo json_encode($response);
                exit;
            }


            if($condicion =='Referencia'){

            $sentenciaSQL = $conexion->prepare("SELECT 
            tbpedido.id as buscar_id,
             tbusuarios.usuario as buscar_User, 
             tbpedido.ref as buscar_referencia, 
             sum(tbpedidodatos.cantidad) as Can_Articulos, 
             tbpedido.medio as buscar_medio, 
             tbpedido.estadopago as buscar_estadopago, 
             tbpedido.total as buscar_total, 
             tbpedido.fecha as buscar_fecha 
             FROM tbpedido INNER JOIN tbusuarios 
             on tbusuarios.idusuario = tbpedido.usuario INNER JOIN tbpedidodatos 
             on tbpedidodatos.ref = tbpedido.ref INNER JOIN tbpedidocliente 
             on tbpedidocliente.ref = tbpedido.ref 
             WHERE tbpedido.ref LIKE :p_id
             GROUP BY tbpedido.ref 
             ORDER BY buscar_User  " );
            $id1 = $id1.'%';
            $sentenciaSQL->bindParam(':p_id', $id1);
            $sentenciaSQL->execute();


            }else if($condicion =='Usuario' ) {

                $sentenciaSQL = $conexion->prepare("SELECT 
                tbpedido.id as buscar_id,
                 tbusuarios.usuario as buscar_User, 
                 tbpedido.ref as buscar_referencia, 
                 sum(tbpedidodatos.cantidad) as Can_Articulos, 
                 tbpedido.medio as buscar_medio, 
                 tbpedido.estadopago as buscar_estadopago, 
                 tbpedido.total as buscar_total, 
                 tbpedido.fecha as buscar_fecha 
                 FROM tbpedido INNER JOIN tbusuarios 
                 on tbusuarios.idusuario = tbpedido.usuario INNER JOIN tbpedidodatos 
                 on tbpedidodatos.ref = tbpedido.ref INNER JOIN tbpedidocliente 
                 on tbpedidocliente.ref = tbpedido.ref 
                 WHERE tbusuarios.usuario LIKE :p_id
                 GROUP BY tbpedido.ref 
                 ORDER BY buscar_User  " );
                $id1 = $id1.'%';
                $sentenciaSQL->bindParam(':p_id', $id1);
                $sentenciaSQL->execute();

            }else if($condicion =='Fecha'){

                if( empty($id2)  ){
                    $response['resultado'] = 'Por favor complete todos los campos';
                    echo json_encode($response);
                    exit;
                }else{

                    $sentenciaSQL = $conexion->prepare("SELECT 
                    tbpedido.id as buscar_id,
                     tbusuarios.usuario as buscar_User, 
                     tbpedido.ref as buscar_referencia, 
                     sum(tbpedidodatos.cantidad) as Can_Articulos, 
                     tbpedido.medio as buscar_medio, 
                     tbpedido.estadopago as buscar_estadopago, 
                     tbpedido.total as buscar_total, 
                     tbpedido.fecha as buscar_fecha 
                     FROM tbpedido INNER JOIN tbusuarios 
                     on tbusuarios.idusuario = tbpedido.usuario INNER JOIN tbpedidodatos 
                     on tbpedidodatos.ref = tbpedido.ref INNER JOIN tbpedidocliente 
                     on tbpedidocliente.ref = tbpedido.ref 
                     WHERE tbpedido.fecha >=  :p_id and tbpedido.fecha <= :p_id2
                      GROUP BY tbpedido.ref 
                     ORDER BY buscar_User  " );
                  
                    $sentenciaSQL->bindParam(':p_id', $id1);
                    $sentenciaSQL->bindParam(':p_id2', $id2);
                    $sentenciaSQL->execute();                   
                }

            }



            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result)>0){
                $count=1;
                        foreach($result as $row ){
                            $json[] =array(
                                'valor' => $count,
                                'id' => filter_var($row['buscar_id'], FILTER_SANITIZE_NUMBER_INT),
                                'usuario'=> filter_var($row['buscar_User'],FILTER_SANITIZE_STRING),
                                'ref' => filter_var($row['buscar_referencia'], FILTER_SANITIZE_STRING),
                                'cant' => filter_var($row['Can_Articulos'],FILTER_SANITIZE_NUMBER_INT),
                                'medio' => filter_var($row['buscar_medio'],FILTER_SANITIZE_STRING),
                                'estadopago' => filter_var($row['buscar_estadopago'], FILTER_SANITIZE_STRING),
                                'total' => number_format(filter_var($row['buscar_total'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                'fecha' => filter_var($row['buscar_fecha'], FILTER_SANITIZE_STRING)
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
