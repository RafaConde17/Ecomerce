<?php
 include('../../Administrador/config/bd.php');  



        $id = $_GET['id'];
        echo "<script>alert('aaa')</scritp>";
        $cancel="Cancelado";

        $sentenciaSQL=$conexion->prepare("UPDATE tbpedido set estadopago= :p_estadopago  where ref = :p_id ");
        $sentenciaSQL->bindParam(':p_estadopago',$cancel);
        $sentenciaSQL->bindParam(':p_id',$id);
        $sentenciaSQL->execute();

header("location:pedidos.php");
?>