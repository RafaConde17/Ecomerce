<?php
include "../../Administrador/config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'ver')
        { 
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbusuarios WHERE idusuario   = :p_ref");
            $sentenciaSQL->bindParam(':p_ref', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $idusuario = $result['idusuario'];
                         $Usuario= $result['Usuario'];
                         $Contraseña= $result['Contraseña'];
                         $idtipousuario= $result['idtipousuario'];
                         $Nombres= $result['Nombres'];
                         $Apellidos= $result['Apellidos'];
                         $Correo	= $result['Correo'];
                         $Numero= $result['Numero'];
                         $imagen	= $result['Imagen'];
                         $Estado= $result['Estado'];

                         $response = array(
                            'idusuario' => $idusuario,
                            'Usuario'=> $Usuario,
                            'Contraseña' => $Contraseña,
                            'Nombres'=> $Nombres,
                            'Apellidos' => $Apellidos,
                            'Correo' => $Correo,
                            'Numero'=> $Numero,
                            'Imagen' => $imagen
                        );
                        $jsonstring = json_encode($response);
                        echo $jsonstring;
        
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