<?php
    $image = $_FILES['imagen']['tmp_name'];
    $name = $_POST['image_name'];
    $ruta = $_POST['image_ruta'];

    move_uploaded_file($image, $ruta.$name);

    $respuesta = array(
        'resultado' => 'La imagen se ha subido correctamente'
     
    );
    echo json_encode($respuesta);
?>
