<?php
include "../../Administrador/config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'ver')
    { 
        try {
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM `tbpedidodatos` 
            WHERE ref   = :p_id");

            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
                                        if(count($result)>0){
                                            $count=1;
                                                            foreach($result as $row ){
                                                                $json[] =array(
                                                                    'valor' => $count,
                                                                    'id' => filter_var($row['id'], FILTER_SANITIZE_NUMBER_INT),
                                                                    'ref'=> filter_var($row['ref'],FILTER_SANITIZE_STRING),
                                                                    'usuario' => filter_var($row['usuario'], FILTER_SANITIZE_NUMBER_INT),
                                                                    'cantidad' => filter_var($row['cantidad'], FILTER_SANITIZE_NUMBER_INT),
                                                                    'imagen' => filter_var($row['imagen'], FILTER_SANITIZE_STRING),
                                                                    'articulos' => filter_var($row['articulos'], FILTER_SANITIZE_STRING),
                                                                    'precio' => number_format(filter_var($row['precio'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                                                    'total' => number_format(filter_var($row['total'],FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION), 2, '.', ''),
                                                                    'fecha' => filter_var($row['fecha'],FILTER_SANITIZE_STRING),
                                                                'estado' => filter_var($row['estado'], FILTER_SANITIZE_NUMBER_INT)
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
            