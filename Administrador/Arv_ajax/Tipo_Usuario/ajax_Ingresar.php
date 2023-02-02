<?php
include "../../config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'ingresar_tipousuario') {

    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
   
    
    //validate inputs
    if(empty($tipo) || empty($estado) ){
     
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }
   
    //check if user already exists
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tbtipousuario WHERE tipo = :dato1 LIMIT 1");
    $sentenciaSQL->bindParam(':dato1', $tipo);
    $sentenciaSQL->execute();
    $user = $sentenciaSQL->fetch();

    if($user){
        $response['resultado'] = $tipo . ' ya se encuentra registrado';
        echo json_encode($response);
        exit;
    }

    //insert user into the database
$sentenciaSQL = $conexion->prepare("INSERT INTO `tbtipousuario` (
tipo,
estado
) VALUES (
:dato1, 
:dato2)");

$sentenciaSQL->bindParam(':dato1', $tipo);
$sentenciaSQL->bindParam(':dato2', $estado);
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