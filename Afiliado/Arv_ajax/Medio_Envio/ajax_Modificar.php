<?php

include "../../../Administrador/config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'modificar') {

    $idmedioenvio= isset($_POST['id']) ? $_POST['id'] : '';
    $imagen_m_envio= isset($_POST['imagen_m_envio']) ? $_POST['imagen_m_envio'] : '';
    $descripcion_m_envio= isset($_POST['descripcion_m_envio']) ? $_POST['descripcion_m_envio'] : '';
    $precio_m_envio= isset($_POST['precio_m_envio']) ? $_POST['precio_m_envio'] : '';
    $estado= isset($_POST['estado']) ? $_POST['estado'] : '';
    
    //validate inputs
    if(empty($idmedioenvio) || empty($imagen_m_envio ) || empty($descripcion_m_envio )  || empty($estado )){
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }

    if(!filter_var($precio_m_envio, FILTER_VALIDATE_FLOAT) && $precio_m_envio != 0 ) {
        $response['resultado'] = 'El precio tiene que ser un número double';
        echo json_encode($response);
        exit;
      }
    
    //insert user into the database
   $sentenciaSQL = $conexion->prepare("UPDATE tbmediodeenvio
    SET 
    imagen_m_envio = :dato2,
    descripcion_m_envio = :dato3,
    precio_m_envio = :dato4,
    estado= :dato5
    WHERE idmedioenvio  = :dato1 ");
    $sentenciaSQL->bindParam(':dato1', $idmedioenvio);
    $sentenciaSQL->bindParam(':dato2', $imagen_m_envio);
    $sentenciaSQL->bindParam(':dato3', $descripcion_m_envio);
    $sentenciaSQL->bindParam(':dato4', $precio_m_envio);
    $sentenciaSQL->bindParam(':dato5', $estado);
    $sentenciaSQL->execute();

    $affected_rows = $sentenciaSQL->rowCount();

    if ($affected_rows > 0) {

    $response['resultado'] = 'Registro Modificado';
    } else {
    $response['resultado'] = 'Registro No Modificado';
    }
    echo json_encode($response);
    exit;
    // Close Connection
    $conexion = null;
}
?>
