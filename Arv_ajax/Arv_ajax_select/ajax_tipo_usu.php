<?php 
include "../../Administrador/config/bd.php";

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

if(!empty($action) && $action == 'selecionartipousu')
{ 
        $sentenciaSQL = $conexion->prepare("SELECT * FROM tbtipousuario where estado = '1' order by tipo asc" );
        $sentenciaSQL->execute();
        $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        
        if($result !=""){
            $count=1;
            foreach($result as $row ){

                $json[] =array(
                   'valor' => $count,
                   'id' => filter_var($row['idtipousuario'], FILTER_SANITIZE_NUMBER_INT),
                   'texto' => filter_var($row['tipo'], FILTER_SANITIZE_STRING)
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
