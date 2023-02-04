<?php 
include "../../Administrador/config/bd.php";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!empty($action) && $action == 'buscarafiliado')
{ 
        $sentenciaSQL = $conexion->prepare("SELECT * FROM `tbusuarios` WHERE idtipousuario = 2 order by NameTienda asc");
        $sentenciaSQL->execute();
        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
        if($result !=""){
            $count=1;
            foreach($result as $row ){

                $json[] =array(
                   'valor' => $count,
                   'id' => filter_var($row['idusuario'], FILTER_SANITIZE_NUMBER_INT),
                   'texto' => filter_var($row['NameTienda'], FILTER_SANITIZE_STRING)
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
