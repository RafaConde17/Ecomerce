<?php
    $image = $_FILES['imagen']['tmp_name'];
    $name = $_POST['image_name'];
    $image_anterior= $_POST['imagen_anterior'];
    $imagen_default=  $_POST['image_default'];
    $ruta = $_POST['image_ruta'];

    move_uploaded_file($image, $ruta.$name);


    $file_path = $ruta . $image_anterior;

    if(file_exists($file_path)) {
        
        if($image_anterior !=$imagen_default){

         unlink($file_path);
         
         $respuesta = array(
            'resultado' => 'La imagen se ha reemplazo correctamente',
            'imagen' =>  $name
        );
        echo json_encode($respuesta);

        }

    }




?>

