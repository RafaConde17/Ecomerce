<?php
include "../../config/bd.php";

$response = array(
    'id' => '',
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'ingresarusuario') {

    $Usuario = isset($_POST['Usuario']) ? $_POST['Usuario'] : '';
    $Contrasenia = isset($_POST['Contrasenia']) ? $_POST['Contrasenia'] : '';
    $idtipousuario = isset($_POST['idtipousuario']) ? $_POST['idtipousuario'] : '';
    $Nombres = isset($_POST['Nombres']) ? $_POST['Nombres'] : '';
    $Apellidos = isset($_POST['Apellidos']) ? $_POST['Apellidos'] : '';
    $Correo = isset($_POST['Correo']) ? $_POST['Correo'] : '';
    $Numero = isset($_POST['Numero']) ? $_POST['Numero'] : '';
    $Imagen = isset($_POST['Imagen']) ? $_POST['Imagen'] : '';
    $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : '';
    
    //validate inputs
    if(empty($Usuario) || empty($Contrasenia) || empty($idtipousuario) || empty($Nombres) || empty($Apellidos) || empty($Correo) || empty($Numero) ||  empty($Estado)){
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
    }
   
    //check if user already exists
    $sentenciaSQL = $conexion->prepare("SELECT * FROM tbusuarios WHERE Usuario = :Usuario LIMIT 1");
    $sentenciaSQL->bindParam(':Usuario', $Usuario);
    $sentenciaSQL->execute();
    $user = $sentenciaSQL->fetch();
    if($user){
        $response['resultado'] = 'El usuario ya existe';
        echo json_encode($response);
        exit;
    }
    
    if (strlen($Usuario) < 8) {
        $response['resultado'] = 'El nombre de usuario debe tener al menos 8 caracteres';
        echo json_encode($response);
        exit;
    }
    if (strlen($Numero) != 9){
        $response['resultado'] = 'El numero de teléfono debe tener 9 caracteres';
        echo json_encode($response);
        exit;
    }

    if(!preg_match('/^[0-9]+$/', $Usuario)) {
        $response['resultado'] = 'El nombre de usuario solo debe contener números';
        echo json_encode($response);
        exit;
    }
    if (!preg_match('/^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', $Contrasenia)){
        $response['resultado'] = 'La contraseña debe tener al menos 8 caracteres y contener al menos una letra mayúscula y un caracter especial';
        echo json_encode($response);
        exit;
    }

    if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $Correo)) {
        $response['resultado'] = 'El correo electronico no tiene un formato valido';
        echo json_encode($response);
        exit;
    }
    //hash and salt the password
    $salt = uniqid(mt_rand(), true);
    $Contrasenia = hash('sha256', $Contrasenia . $salt);
    
    //insert user into the database
$sentenciaSQL = $conexion->prepare("INSERT INTO `tbusuarios` 
(`Usuario`, 
`Contraseña`, `idtipousuario`,
 `Nombres`, `Apellidos`,
 `Correo`, `Numero`,
 `Imagen`, `Estado`) VALUES (

:p_usuario, 
:p_contrasenia, 
:p_idtipousuario,
:p_nombres, 
:p_apellidos, 
:p_correo, 
:p_numero, 
:p_imagen, 
:p_estado )");

$sentenciaSQL->bindParam(':p_usuario', $Usuario);
$sentenciaSQL->bindParam(':p_contrasenia', $Contrasenia);
$sentenciaSQL->bindParam(':p_idtipousuario', $idtipousuario);
$sentenciaSQL->bindParam(':p_nombres', $Nombres);
$sentenciaSQL->bindParam(':p_apellidos', $Apellidos);
$sentenciaSQL->bindParam(':p_correo', $Correo);
$sentenciaSQL->bindParam(':p_numero', $Numero);
$sentenciaSQL->bindParam(':p_imagen', $Imagen);
$sentenciaSQL->bindParam(':p_estado', $Estado);
$sentenciaSQL->execute();

$affected_rows = $sentenciaSQL->rowCount();

if ($affected_rows > 0) {
$response['id'] = $Usuario;
$response['resultado'] = 'Ingresado';
} else {
$response['resultado'] = 'Failed to insert user';
}

echo json_encode($response);
exit;
// Close Connection
$conexion = null;

}

?>