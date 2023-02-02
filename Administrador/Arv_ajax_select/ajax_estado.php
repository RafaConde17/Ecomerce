<?php 
include "../config/bd.php";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!empty($action) && $action == 'buscarestado')
{ 
        $sentenciaSQL = $conexion->prepare("SELECT * FROM tbestado");
        $sentenciaSQL->execute();
        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
        if($result !=""){
            $count=1;
            foreach($result as $row ){

                $json[] =array(
                   'valor' => $count,
                   'id' => filter_var($row['idestado'], FILTER_SANITIZE_NUMBER_INT),
                   'texto' => filter_var($row['detalleestado'], FILTER_SANITIZE_STRING)
                );    
                $count++;
            }

            $jsonstring = json_encode($json);
            echo $jsonstring;
        exit;
        
        }
        echo 'error';
        exit;

}
exit;
?>
