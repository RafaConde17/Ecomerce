<?php
include "../../config/bd.php";

if(!empty($_POST)){
        
    if($_POST['action'] == 'verlistausuario')
    { 
                        $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbusuarios inner join tbtipousuario on tbtipousuario.idtipousuario  = tbusuarios.idtipousuario  inner join tbestado on tbestado.idestado = tbusuarios.Estado " );
                        $sentenciaSQL->execute();
                        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


                        if($result !=""){
                        
                            if(count($result)>0){
                            $count=1;
                            foreach($result as $row ){
                                                          $json[] =array(
                                                                'valor' => $count,
                                                                'idusuario' => filter_var($row['idusuario'], FILTER_SANITIZE_NUMBER_INT),
                                                                'Usuario'=> filter_var($row['Usuario'],FILTER_SANITIZE_STRING),
                                                                'idtipousuario' => filter_var($row['idtipousuario'],FILTER_SANITIZE_NUMBER_INT),
                                                                'tipousuario' => filter_var($row['tipo'],FILTER_SANITIZE_STRING),
                                                                'Nombres'=> filter_var($row['Nombres'],FILTER_SANITIZE_STRING),
                                                                'Apellidos' => filter_var($row['Apellidos'],FILTER_SANITIZE_STRING),
                                                                'imagen' =>filter_var( $row['Imagen'],FILTER_SANITIZE_STRING),
                                                                'idestado' => filter_var($row['Estado'],FILTER_SANITIZE_NUMBER_INT),
                                                                'Estado' => filter_var($row['detalleestado'],FILTER_SANITIZE_STRING)
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