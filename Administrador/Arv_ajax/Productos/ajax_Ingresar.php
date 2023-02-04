<?php
include "../../config/bd.php";

$response = array(
    'resultado' => ''
);

if (!empty($_POST) && isset($_POST['action']) && $_POST['action'] == 'ingresar') {


    $producto= isset($_POST['producto']) ? $_POST['producto'] : '';
    $idcategoria= isset($_POST['idcategoria']) ? $_POST['idcategoria'] : '';
    $subcategoria= isset($_POST['subcategoria']) ? $_POST['subcategoria'] : '';
    $descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $cantidad= isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $precio= isset($_POST['precio']) ? $_POST['precio'] : '';
    $imagen= isset($_POST['imagen']) ? $_POST['imagen'] : '';
    $estado= isset($_POST['estado']) ? $_POST['estado'] : '';


    //validate inputs
    if(empty($producto) ||
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

      if (!filter_var($cantidad, FILTER_VALIDATE_INT) || $cantidad <= 0) {
        $response['resultado'] = 'La cantidad tiene que ser un número entero mayor a 0';
        echo json_encode($response);
        exit;
      }
      
    
   //check if item already exists
   $sentenciaSQL = $conexion->prepare("SELECT * FROM tbproducto WHERE producto = :dato1 and idusuario=:dato2 LIMIT 1");
   $sentenciaSQL->bindParam(':dato1', $producto);
   $sentenciaSQL->bindParam(':dato2', $idusuario);
   $sentenciaSQL->execute();
   $dato = $sentenciaSQL->fetch();

   if($dato){
       $response['resultado'] = $producto . ' ya se encuentra registrado';
       echo json_encode($response);
       exit;
   }


    //insert user into the database
    $sentenciaSQL = $conexion->prepare("INSERT INTO tbproducto (
    producto,
    idcategoria,
    subcategoria,
    descripcion,
    cantidad,
    precio,
    imagen,
    estado
    ) VALUES (
    :dato1, 
    :dato2,
    :dato3,
    :dato4,
    :dato5,
    :dato6,
    :dato7,
    :dato8)");

    $sentenciaSQL->bindParam(':dato1', $producto);
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