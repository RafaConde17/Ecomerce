<?php
include "../../Administrador/config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'login')
        {   

       
            



            $txtusuario = $_POST['txtusuario'];
            $txtcontrasenia =  hash('sha256', $_POST['txtcontrasenia']);
            
             
             
              //  $txtcontrasenia =  $_POST['txtcontrasenia'];

             if (!function_exists('hash')) {

                $response['resultado'] = 'La función hash() está disponible.';
                echo json_encode($response);
                exit;
             }

            if(empty($txtusuario) || empty($txtcontrasenia ) ){

                $response['resultado'] = 'Por favor complete todos los campos';
                echo json_encode($response);
                exit;
            }

        


            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbusuarios
            inner join  tbtipousuario on tbtipousuario.idtipousuario = tbusuarios.idtipousuario  
            WHERE Usuario = :usuario AND Contraseña=:contrasenia");
            $sentenciaSQL->bindParam(':usuario', $txtusuario);
            $sentenciaSQL->bindParam(':contrasenia', $txtcontrasenia);
            $sentenciaSQL->execute();

            $listaloginusu=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if($listaloginusu !=""){

                         $id= $listaloginusu['idusuario'];
                         $Usuario= $listaloginusu['Usuario'];
                         $tipousuario= $listaloginusu['idtipousuario'];
                         $nombres= $listaloginusu['Nombres'];
                         $apellidos= $listaloginusu['Apellidos'];

                        
                         $response = array(
                            'id' => $id,
                            'Usuario' => $Usuario,
                            'tipousuario' => $tipousuario,
                            'nombres' => $nombres,
                            'apellidos' => $apellidos ,
                            'resultado' => "Login Confirmado"
                        );
                        $jsonstring = json_encode($response);
                        echo $jsonstring;
                        exit;
            
            }else {
                $response = array(
                    'resultado' => "Usuario no Existe"
                );
                $jsonstring = json_encode($response);
                echo $jsonstring;
                exit;
            }

            echo 'error';
            exit;
    }
   

}
echo 'error';
exit;

?>