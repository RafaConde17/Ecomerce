<?php

include "../../../Administrador/config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'ingresar') {

    $medioenvio= isset($_POST['medioenvio']) ? $_POST['medioenvio'] : '';
    $idusuario= isset($_POST['idusuario']) ? $_POST['idusuario'] : '';
    $imagen_m_envio= isset($_POST['imagen_m_envio']) ? $_POST['imagen_m_envio'] : '';
    $descripcion_m_envio= isset($_POST['descripcion_m_envio']) ? $_POST['descripcion_m_envio'] : '';
    $precio_m_envio= isset($_POST['precio_m_envio']) ? $_POST['precio_m_envio'] : '';
    $estado= isset($_POST['estado']) ? $_POST['estado'] : '';
    
    //validate inputs
    if(empty($medioenvio)|| empty($idusuario) || empty($imagen_m_envio ) || empty($descripcion_m_envio )  || empty($estado )){
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }
    if(!filter_var($precio_m_envio, FILTER_VALIDATE_FLOAT) && $precio_m_envio != 0 ) {
        $response['resultado'] = 'El precio tiene que ser un número double';
        echo json_encode($response);
        exit;
      }

    //check if user already exists
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tbmediodeenvio WHERE medioenvio = :dato1 and idusuario =:dato2  LIMIT 1");
    $sentenciaSQL->bindParam(':dato1', $medioenvio);
    $sentenciaSQL->bindParam(':dato2', $idusuario);
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
    idusuario,
    imagen_m_envio,
    descripcion_m_envio,
    precio_m_envio,
    estado
    ) VALUES (
    :dato1, 
    :dato2,
    :dato3,
    :dato4,
    :dato5,
    :dato6)");

    $sentenciaSQL->bindParam(':dato1', $medioenvio);
    $sentenciaSQL->bindParam(':dato2', $idusuario);
    $sentenciaSQL->bindParam(':dato3', $imagen_m_envio);
    $sentenciaSQL->bindParam(':dato4', $descripcion_m_envio);
    $sentenciaSQL->bindParam(':dato5', $precio_m_envio);
    $sentenciaSQL->bindParam(':dato6', $estado);
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