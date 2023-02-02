<?php

include "../../config/bd.php";

    if (!empty($_POST)) {
        if ($_POST['action'] == 'borrarusuario') {
            // Input validation

            
            $idusuario = filter_var($_POST['idusuario'], FILTER_VALIDATE_INT);
            $imagen="";


            if (!$idusuario ) {
                echo 'error';
                exit;
            }
           
            $sentenciaSQL = $conexion->prepare("SELECT * FROM `tbusuarios` WHERE idusuario = :p_id ");
            $sentenciaSQL->bindParam(':p_id', $idusuario);
            $sentenciaSQL->execute();
            $result =$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if($result !=""){
                $imagen= $result['Imagen'];
            
            }

            $sentenciaSQL = $conexion->prepare("DELETE FROM `tbusuarios` WHERE idusuario = :pidusuario ");
            $sentenciaSQL->bindParam(':pidusuario', $idusuario);
            $sentenciaSQL->execute();

            $affected_rows = $sentenciaSQL->rowCount();

              if ($affected_rows > 0) {

             
       
                
                    $response = array(
                        'imagen' => $imagen,
                        'resultado' => 'Borrado'
                    );
                    
                    echo json_encode($response);
                    exit;
            
            }

          
        }
    }

?>
