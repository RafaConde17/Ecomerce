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
           
            $sentenciaSQL = $conexion->prepare("SELECT * FROM tbmediodeenvio WHERE idmedioenvio  = :dato1 ");
            $sentenciaSQL->bindParam(':dato1', $id);
            $sentenciaSQL->execute();
            $result =$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if($result !=""){
                $imagen= $result['imagen_m_envio'];
            
            }

            $sentenciaSQL = $conexion->prepare("DELETE FROM tbmediodeenvio WHERE idmedioenvio   = :dato2 ");
            $sentenciaSQL->bindParam(':dato2', $id);
            $sentenciaSQL->execute();

                $affected_rows = $sentenciaSQL->rowCount();

             if ($affected_rows > 0) {

                    $response = array(
                        'imagen' => $imagen,
                        'resultado' => 'Elemento Borrado'
                    );
                    
                    echo json_encode($response);
                    exit;
            
            }

          
        }
    }

?>
