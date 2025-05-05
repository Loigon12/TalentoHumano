<?php
$servername="localhost";
$username="root";
$password="";

try {
    $conn = new PDO("mysql:host=$servername;dbname=comfatolima", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo"conexion satisfactoria";
}catch(PDOEXCEPTION $e) {
    echo"fallo de conexion: " .$e->getmessage();
}
?>