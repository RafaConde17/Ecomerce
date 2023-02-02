<?php
include "../../config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'lista')
    { 
                        $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbcategoria_producto 
                         INNER join tbestado on tbestado.idestado = tbcategoria_producto.estado  order by categoria asc" );
                        $sentenciaSQL->execute();
                        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


                        if($result !=""){
                        
                            if(count($result)>0){
                            $count=1;
                            foreach($result as $row ){
                                                          $json[] =array(
                                                                'valor' => $count,
                                                                'id' => filter_var($row['id_categoriapro'], FILTER_SANITIZE_NUMBER_INT),
                                                                'categoria'=> filter_var($row['categoria'],FILTER_SANITIZE_STRING),
                                                                'estado' => filter_var($row['detalleestado'],FILTER_SANITIZE_STRING)
                                                                );
                                                                $count++;
                                                                }
                                                                $jsonstring = json_encode($json);
                                                                echo $jsonstring;
                                                                exit;
                                                                }
                                                                }else{
                                                                echo 'error';
                                                                exit;
                                                                }
                                                                }
                                                                }
                                                                
                                                                ?>