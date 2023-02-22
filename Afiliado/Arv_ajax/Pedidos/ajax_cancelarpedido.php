<?php
 include('../../../Administrador/config/bd.php');  
 if(!empty($_POST)){
        
        if($_POST['action'] == 'borrar')
        { 

        $id = $_POST['id'];
        $cancel="Cancelado";

        $sentenciaSQL=$conexion->prepare(" SELECT * FROM  tbpedido where  ref = :p_id ");
        $sentenciaSQL->bindParam(':p_id',$id);
        $sentenciaSQL->execute();

        $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);


        if($result['estadopago'] == "Cancelado")     
        {

        echo json_encode(["resultado" => "El pedido se encuentra Cancelado"]);
        exit;
    
        }   

        $sentenciaSQL=$conexion->prepare("UPDATE tbpedido set estadopago= :p_estadopago  where ref = :p_id ");
        $sentenciaSQL->bindParam(':p_estadopago',$cancel);
        $sentenciaSQL->bindParam(':p_id',$id);
        $sentenciaSQL->execute();

        echo json_encode(["resultado" => "Pedido Cancelado"]);
        exit;

        }else{

                echo json_encode(["resultado" => "Error"]);
                exit;     
        }
}

?>