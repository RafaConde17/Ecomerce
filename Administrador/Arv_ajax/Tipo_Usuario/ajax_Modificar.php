<?php
include "../../config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'modificar_tipousuario') {

    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    //validate inputs
    if(empty($estado) || empty($id) ){
     
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }

    //insert user into the database
   $sentenciaSQL = $conexion->prepare("UPDATE tbtipousuario
    SET 
    estado = :dato2
    WHERE idtipousuario  = :dato3 ");
    $sentenciaSQL->bindParam(':dato2', $estado);
    $sentenciaSQL->bindParam(':dato3', $id);
    $sentenciaSQL->execute();

    $affected_rows = $sentenciaSQL->rowCount();

    if ($affected_rows > 0) {
    $response['resultado'] = 'Registro Modificado';
    } else {
    $response['resultado'] = 'Registro No Ingresado';
    }

echo json_encode($response);
exit;
        // Close Connection
        $conexion = null;

}

?>