<?php

include "../../config/bd.php";

    if (!empty($_POST)) {

        if ($_POST['action'] == 'borrar') {
            // Input validation

            $id = $_POST['id'];
       

            if (!$id ) {
                echo 'error';
                exit;
            }
       
            $sentenciaSQL = $conexion->prepare("DELETE FROM tbpedido WHERE ref = :dato1 ");
            $sentenciaSQL->bindParam(':dato1', $id);
            $sentenciaSQL->execute();
            $affected_rows_1 = $sentenciaSQL->rowCount();

            $sentenciaSQL = $conexion->prepare("DELETE FROM tbpedidocliente WHERE ref = :dato2 ");
            $sentenciaSQL->bindParam(':dato2', $id);
            $sentenciaSQL->execute();
            $affected_rows_2 = $sentenciaSQL->rowCount();

            $sentenciaSQL = $conexion->prepare("DELETE FROM tbpedidodatos WHERE ref = :dato3 ");
            $sentenciaSQL->bindParam(':dato3', $id);
            $sentenciaSQL->execute();
            $affected_rows_3 = $sentenciaSQL->rowCount();


              if ($affected_rows_1 > 0 && $affected_rows_2 > 0 && $affected_rows_3 > 0) {

                    $response = array(
                        'resultado' => 'Elemento Borrado'
                    );
                    
                    echo json_encode($response);
                    exit;
            
            }

          
        }
    }

?>
