<?php

include "../../../Administrador/config/bd.php";

    if (!empty($_POST)) {
        if ($_POST['action'] == 'borrar') {
            // Input validation
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
            $imagen="";

            if (!$id ) {
                echo 'error';
                exit;
            }
           
            $sentenciaSQL = $conexion->prepare("SELECT * FROM `tbproducto` WHERE idproducto  = :p_id ");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
            $result =$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if($result !=""){
                $imagen= $result['imagen'];
            
            }

       
            $sentenciaSQL = $conexion->prepare("DELETE FROM `tbproducto` WHERE idproducto    = :p_id ");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();

            $affected_rows = $sentenciaSQL->rowCount();

              if ($affected_rows > 0) {

                    $response = array(
                        'imagen' => $imagen,
                        'resultado' => 'Registro Borrado'
                    );
                    
                    echo json_encode($response);
                    exit;
            
            }

          
        }
    }

?>
