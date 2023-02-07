<?php 

include "../../Administrador/config/bd.php";


if(!empty($_POST)){
        
    if($_POST['action'] == 'ver')
    { 
        $id= $_POST['id'];

            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbmediodeenvio 
            INNER JOIN tbestado on tbestado.idestado = tbmediodeenvio.estado 
            INNER JOIN tbusuarios on tbusuarios.idusuario  = tbmediodeenvio.idusuario 
            where tbmediodeenvio.estado  = '1' and tbmediodeenvio.idmedioenvio = :dato1
            ORDER BY medioenvio ASC ");
            $sentenciaSQL->bindParam(':dato1', $id);
            $sentenciaSQL->execute();

            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
                if($result !=""){
                                $idmedioenvio= $result['idmedioenvio'];
                                $medioenvio= $result['medioenvio'];
                                $Usuario= $result['Usuario'];
                                $imagen_m_envio= $result['imagen_m_envio'];
                                $descripcion_m_envio= $result['descripcion_m_envio'];
                                $precio_m_envio= $result['precio_m_envio'];
                                $estado= $result['detalleestado'];
                        
                                $response = array(
                                'idmedioenvio'=>$idmedioenvio,
                                'medioenvio' => $medioenvio,
                                'Usuario'=>$Usuario,
                                'imagen_m_envio' => $imagen_m_envio,
                                'descripcion_m_envio'=>$descripcion_m_envio,
                                'precio_m_envio'=>$precio_m_envio,
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
            