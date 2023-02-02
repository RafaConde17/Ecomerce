<?php
include "../../config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'modificar') {

    $idproducto = isset($_POST['id']) ? $_POST['id'] : '';
    $idcategoria= isset($_POST['idcategoria']) ? $_POST['idcategoria'] : '';
    $subcategoria= isset($_POST['subcategoria']) ? $_POST['subcategoria'] : '';
    $descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $cantidad= isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $precio= isset($_POST['precio']) ? $_POST['precio'] : '';
    $imagen= isset($_POST['imagen']) ? $_POST['imagen'] : '';
    $estado= isset($_POST['estado']) ? $_POST['estado'] : '';
    
    //validate inputs
  //validate inputs
  if(empty($idproducto) ||
  empty($idcategoria ) ||
  empty($subcategoria ) ||
  empty($cantidad ) ||
  empty($precio ) ||
  empty($imagen ) ||
  empty($estado )){
     $response['resultado'] = 'Por favor complete todos los campos';
     echo json_encode($response);
     exit;
 }


    if(!filter_var($precio, FILTER_VALIDATE_FLOAT)) {
        $response['resultado'] = 'El precio tiene que ser un número double';
        echo json_encode($response);
        exit;
      }
    
    //insert user into the database
   $sentenciaSQL = $conexion->prepare("UPDATE tbproducto
    SET 
    idcategoria  = :dato2,
    subcategoria  = :dato3,
    descripcion  = :dato4,
    cantidad  = :dato5,
    precio  = :dato6,
    imagen  = :dato7,
    estado = :dato8
    WHERE idproducto  = :dato1 ");
    $sentenciaSQL->bindParam(':dato1', $idproducto);
    $sentenciaSQL->bindParam(':dato2', $idcategoria);
    $sentenciaSQL->bindParam(':dato3', $subcategoria);
    $sentenciaSQL->bindParam(':dato4', $descripcion);
    $sentenciaSQL->bindParam(':dato5', $cantidad);
    $sentenciaSQL->bindParam(':dato6', $precio);
    $sentenciaSQL->bindParam(':dato7', $imagen);
    $sentenciaSQL->bindParam(':dato8', $estado);
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
