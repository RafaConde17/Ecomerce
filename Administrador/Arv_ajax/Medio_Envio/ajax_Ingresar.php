<?php
include "../../config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'ingresar') {

    $medioenvio= isset($_POST['medioenvio']) ? $_POST['medioenvio'] : '';
    $imagen_m_envio= isset($_POST['imagen_m_envio']) ? $_POST['imagen_m_envio'] : '';
    $descripcion_m_envio= isset($_POST['descripcion_m_envio']) ? $_POST['descripcion_m_envio'] : '';
    $precio_m_envio= isset($_POST['precio_m_envio']) ? $_POST['precio_m_envio'] : '';
    $estado= isset($_POST['estado']) ? $_POST['estado'] : '';
    
    //validate inputs
    if(empty($medioenvio) || empty($imagen_m_envio ) || empty($descripcion_m_envio ) || empty($precio_m_envio ) || empty($estado )){
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }
    if(!filter_var($precio_m_envio, FILTER_VALIDATE_FLOAT)) {
        $response['resultado'] = 'El precio tiene que ser un número double';
        echo json_encode($response);
        exit;
      }
    
      
      
      

    //check if user already exists
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tbmediodeenvio WHERE medioenvio = :dato1 LIMIT 1");
    $sentenciaSQL->bindParam(':dato1', $medioenvio);
    $sentenciaSQL->execute();
    $dato = $sentenciaSQL->fetch();

    if($dato){
        $response['resultado'] = $medioenvio . ' ya se encuentra registrado';
        echo json_encode($response);
        exit;
    }

    //insert user into the database
    $sentenciaSQL = $conexion->prepare("INSERT INTO tbmediodeenvio (
    medioenvio,
    imagen_m_envio,
    descripcion_m_envio,
    precio_m_envio,
    estado
    ) VALUES (
    :dato1, 
    :dato2,
    :dato3,
    :dato4,
    :dato5)");

    $sentenciaSQL->bindParam(':dato1', $medioenvio);
    $sentenciaSQL->bindParam(':dato2', $imagen_m_envio);
    $sentenciaSQL->bindParam(':dato3', $descripcion_m_envio);
    $sentenciaSQL->bindParam(':dato4', $precio_m_envio);
    $sentenciaSQL->bindParam(':dato5', $estado);
    $sentenciaSQL->execute();

    $affected_rows = $sentenciaSQL->rowCount();

if ($affected_rows > 0) {
    $response['resultado'] = 'Registro Ingresado';
} else {
    $response['resultado'] = 'Registro No Ingresado';
}

    echo json_encode($response);
    exit;
        // Close Connection
    $conexion = null;

}

?>