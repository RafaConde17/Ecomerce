<?php

include "../../Administrador/config/bd.php";
$response = array(
    'id' => '',
    'resultado' => ''
);


if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'modificarusuario') {
      
    // Input validation
        $idusuario = filter_var($_POST['idusuario'], FILTER_VALIDATE_INT);
        $Contrasenia = hash('sha256', $_POST['Contrasenia']);
        $Nombres = filter_var($_POST['Nombres'], FILTER_SANITIZE_STRING);
        $Apellidos = filter_var($_POST['Apellidos'], FILTER_SANITIZE_STRING);
        $Correo = filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL);
        $Numero = filter_var($_POST['Numero'], FILTER_SANITIZE_STRING);
        $Imagen = filter_var($_POST['Imagen'], FILTER_SANITIZE_STRING);
            
    
         if(empty($idusuario) ||  empty($Nombres ) || empty($Apellidos ) || empty($Correo ) || empty($Numero ) || empty($Imagen )){
        $response['resultado'] = 'Por favor complete todos los campos';
        echo json_encode($response);
        exit;
        }

        // Prepared statements
        $sentenciaSQL = $conexion->prepare("UPDATE tbusuarios 
            SET 
            Contraseña = :p_contrasenia,
            Nombres = :p_nombres,
            Apellidos = :p_apellidos,
            Correo = :p_correo,
            Numero = :p_numero,
            Imagen = :p_imagen
            WHERE idusuario = :pidusuario ");

        $sentenciaSQL->bindParam(':p_contrasenia', $Contrasenia);
        $sentenciaSQL->bindParam(':p_nombres', $Nombres);
        $sentenciaSQL->bindParam(':p_apellidos', $Apellidos);
        $sentenciaSQL->bindParam(':p_correo', $Correo);
        $sentenciaSQL->bindParam(':p_numero', $Numero);
        $sentenciaSQL->bindParam(':p_imagen', $Imagen);
        $sentenciaSQL->bindParam(':pidusuario', $idusuario);
        $sentenciaSQL->execute();

        $affected_rows = $sentenciaSQL->rowCount();

        if ($affected_rows > 0) {
        $response['id'] = $idusuario;
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
