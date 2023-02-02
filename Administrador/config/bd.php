<?php
$host="localhost";
$bd="bd_myrest";
$usuario="root";
$contrasenia="";


try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd", $usuario,$contrasenia);
    
} catch (PDOException $ex) {
    echo $ex->getMessage();
}


?>