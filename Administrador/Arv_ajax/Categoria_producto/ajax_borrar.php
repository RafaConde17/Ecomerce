<?php

include "../../config/bd.php";

    if (!empty($_POST)) {
        if ($_POST['action'] == 'borrar') {
            // Input validation
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $imagen="";


            if (!$id ) {
                echo 'error';
                exit;
            }
        
       
            $sentenciaSQL = $conexion->prepare("DELETE FROM `tbcategoria_producto` WHERE id_categoriapro   = :p_id ");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();

            $affected_rows = $sentenciaSQL->rowCount();

              if ($affected_rows > 0) {

                    $response = array(
                    
                        'resultado' => 'Elemento Borrado'
                    );
                    
                    echo json_encode($response);
                    exit;
            
            }

          
        }
    }

?>
