<?php
include "../../config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'selecionar')
        { 
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbcategoria_producto WHERE id_categoriapro   = :p_id");
            $sentenciaSQL->bindParam(':p_id', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $estado= $result['estado'];
                         $id_categoriapro= $result['id_categoriapro'];
                         $categoria= $result['categoria'];
                        
                         $response = array(
                           
                            'id'=>$id_categoriapro,
                            'categoria' => $categoria,
                            'estado' => $estado
                        );
                        $jsonstring = json_encode($response);
                        echo $jsonstring;
        
                //  var_dump(json_decode($json));
                // var_dump(json_decode($json, true));
                //print_r( json_decode(json_encode($list),true));
               
                exit;
            
            }
            echo 'error';
            exit;
    }
   

}
exit;

?>