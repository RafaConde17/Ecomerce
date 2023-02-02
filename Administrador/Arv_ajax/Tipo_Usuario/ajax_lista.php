<?php
include "../../config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'verlista_tipousuario')
    { 
                        $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbtipousuario 
                         INNER join tbestado on tbestado.idestado = tbtipousuario.estado  order by tipo asc" );
                        $sentenciaSQL->execute();
                        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


                        if($result !=""){
                        
                            if(count($result)>0){
                            $count=1;
                            foreach($result as $row ){
                                                          $json[] =array(
                                                                'valor' => $count,
                                                                'id' => filter_var($row['idtipousuario'], FILTER_SANITIZE_NUMBER_INT),
                                                                'tipo'=> filter_var($row['tipo'],FILTER_SANITIZE_STRING),
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