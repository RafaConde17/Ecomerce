<?php
include "../config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'selecionarcategoria')
        { 
            $referencia= $_POST['referencia'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbcategoria_producto WHERE id_categoriapro = :p_ref");
            $sentenciaSQL->bindParam(':p_ref', $referencia);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $index= $result['estado'];
                         $descripcion= $result['categoria'];
                        
                         $response = array(
                            'index' => $index,
                            'descripcion' => $descripcion
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