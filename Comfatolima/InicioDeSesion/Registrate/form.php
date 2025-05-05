<?php
include_once 'conexion.php';

$asunto=$_POST['asunto'];
$mensaje=$_POST['textarea'];
$asunto= "El talento es: " . $_POST['asunto'] . "\r\n";
$mensaje= "Mensaje: " . $_POST ['mensaje'] . "\r\n";
$mensaje= "enviado el " . date('d/m/Y', time());

$para= "personalizateconsolo@gmail.com";
$asunto ="Este mail fue enviado desde la web";

mail($para, $asunto, utf8_decode($mensaje), $header);
header('location:exito.html');
?>