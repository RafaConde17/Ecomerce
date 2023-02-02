<?php
include "../../Administrador/config/bd.php";
    if(!empty($_POST)){
        
        if($_POST['action'] == 'buscarproductos')
        { 
            $referencia= $_POST['referencia'];
            $sentenciaSQL=$conexion->prepare(" SELECT * FROM tbpedidodatos WHERE ref = :p_ref");
            $sentenciaSQL->bindParam(':p_ref', $referencia);
            $sentenciaSQL->execute();
               
            $result=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
            if($result !=""){
        
                $count = 1;
                foreach($result as $row ){

                    $json[] =array(
                        'indice' => $count,
                       'imagen' => $row['imagen'],
                       'cantidad' => $row['cantidad'],
                       'articulos' => $row['articulos'],
                       'precio' => $row['precio'],
                       'total' => $row['cantidad'] * $row['precio']
                    );    
                    $count++;
                }



                $jsonstring = json_encode($json);
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