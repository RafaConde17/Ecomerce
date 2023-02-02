<?php 
include "../../Administrador/config/bd.php";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!empty($action) && $action == 'selecionar_combo')
{ 
        $sentenciaSQL = $conexion->prepare("SELECT * FROM tbcategoria_producto where estado = '1' order by categoria asc");
        $sentenciaSQL->execute();
        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
        if($result !=""){
            $count=1;
            foreach($result as $row ){

                $json[] =array(
                   'valor' => $count,
                   'id' => filter_var($row['id_categoriapro'], FILTER_SANITIZE_NUMBER_INT),
                   'categoria' => filter_var($row['categoria'], FILTER_SANITIZE_STRING)
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
