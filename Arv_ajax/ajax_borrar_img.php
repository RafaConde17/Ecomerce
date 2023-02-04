<?php
    $name = $_POST['image_name'];
    $imagen_default=  $_POST['image_default'];
    $ruta = $_POST['image_ruta'];

    $file_path = $ruta . $name;

    if(file_exists($file_path)) {
        
        if($name !=$imagen_default){

         unlink($file_path);

            $respuesta = array(
                'imagen' => $name,
                'resultado' => 'La imagen se ha borrado correctamente'
            );

            echo json_encode($respuesta);
            exit;
        }else{

        $respuesta = array(
            'imagen' => $name,
            'resultado' => 'La imagen se ha borrado correctamente'
        );
        echo json_encode($respuesta);
        exit;
        }

    }

    


?>

