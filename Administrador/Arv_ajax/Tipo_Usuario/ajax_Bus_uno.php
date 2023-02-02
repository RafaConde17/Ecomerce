<?php
include "../../config/bd.php";

    if(!empty($_POST)){
        
        if($_POST['action'] == 'ver')
        { 
            $id= $_POST['id'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbtipousuario WHERE idtipousuario   = :p_ref");
            $sentenciaSQL->bindParam(':p_ref', $id);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
            
            if($result !=""){

                         $index= $result['estado'];
                         $idtipousuario= $result['idtipousuario'];
                         $descripcion= $result['tipo'];
                        
                         $response = array(
                            'index' => $index,
                            'idtipousuario'=>$idtipousuario,
                            'descripcion' => $descripcion
                        );
                        $jsonstring = json_encode($response);
                        echo $jsonstring;
        
             
               
                exit;
            
            }
            echo 'error';
            exit;
    }
   

}
exit;

?>