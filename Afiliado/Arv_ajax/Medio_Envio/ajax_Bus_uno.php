<?php

include "../../../Administrador/config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'seleccionar')
        { 
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbmediodeenvio WHERE idmedioenvio   = :p_id");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $medioenvio= $result['medioenvio'];
                         $imagen_m_envio= $result['imagen_m_envio'];
                         $descripcion_m_envio= $result['descripcion_m_envio'];
                         $precio_m_envio= $result['precio_m_envio'];
                         $estado= $result['estado'];


                         $response = array(
                            'medioenvio'=>$medioenvio,
                            'imagen_m_envio' => $imagen_m_envio,
                            'descripcion_m_envio'=>$descripcion_m_envio,
                            'precio_m_envio' => $precio_m_envio,
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