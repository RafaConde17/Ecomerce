<?php
include "../../Administrador/config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'ver')
        { 

            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbpedidocliente WHERE ref = :p_id");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $nombre= $result['nombre'];
                         $apellidos= $result['apellidos'];
                         $direccion= $result['direccion'];
                         $telefono= $result['telefono'];

                         $response = array(
                            'nombre'=>$nombre,
                            'apellidos' => $apellidos,
                            'direccion'=>$direccion,
                            'telefono' => $telefono
                        
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