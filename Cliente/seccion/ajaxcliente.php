<?php
include "../../Administrador/config/bd.php";
    if(!empty($_POST)){
        
        if($_POST['action'] == 'buscarcliente')
        { 
            $referencia= $_POST['referencia'];

            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbpedidocliente WHERE ref = :p_ref");
            $sentenciaSQL->bindParam(':p_ref', $referencia);
            $sentenciaSQL->execute();
       
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

             
                $nombre= $result['nombre'];
                $apellidos= $result['apellidos'];
                $direccion= $result['direccion'];
                $telefono= $result['telefono'];
    
                $json = '{"nombre":"'. $nombre .'"
                         ,"apellidos":"' . $apellidos . '"
                         ,"direccion":"' . $direccion . '"
                         ,"telefono":"' . $telefono .  '"}';

  
                echo $json;
                //  var_dump(json_decode($json));
                // var_dump(json_decode($json, true));
                //print_r( json_decode(json_encode($list),true));
               
                exit;
            
            }
            echo 'error';
            exit;
    }
   

}
exit;

?>