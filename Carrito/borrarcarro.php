<?php 
session_start();
ob_start();

unset($_SESSION['carrito']);
header("Location: ".$_SERVER['HTTP_REFERER']."");

?>