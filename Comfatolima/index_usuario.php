<?php
include_once 'conexion.php';

     if(isset($_POST['guardar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $direccion=$_POST['direccion'];
        $correo=$_POST['correo'];
        $login=$_POST['login'];
        $contrasena=$_POST['contrasena'];
        $telefono=$_POST['telefono'];

        if (!empty($id)&&!empty($nombre)&& !empty($apellido) && !empty($direccion ) &&  !empty($correo)  && !empty($login) && !empty($contrasena) && !empty($telefono))
        
        $consulta_insert = $conn->prepare('INSERT INTO usuarios (id,nombre,apellido,direccion,correo,login,contrasena,telefono) 
        VALUES (:id,:nombre,:apellido,:direccion,:correo,:login,:contrasena,:telefono)' );
        $consulta_insert ->execute(array(
            ':id' =>$id,
            ':nombre' =>$nombre,
            ':apellido'=>$apellido,
            ':direccion'=>$direccion,
            ':correo'=>$correo,
            ':login'=>$login,
            'contrasena'=>$contrasena,
            'telefono'=>$telefono
        ));
        
            header('Location: index_usuario.php');
    }
            else {
                echo "<script> alert('Los campos estan vacios');</script>";
            }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor">
        <h2>REGISTRO</h2>
        <form action=""method="post">
            <div class="form-group">
                <input type="text" name="id" placeholder="id" class="input_text">
                <input type="text" name="nombre" placeholder="nombre" class="input_text">
        <input type="text" name="apellido" placeholder="apellido" class="input_text">
        <input type="text" name="direccion" placeholder="direccion" class="input_text">
    </div>

    <div class="form-group">
        <input type="text" name="correo" placeholder="correo" class="input_text">
        <input type="text" name="login" placeholder="login" class="input_text">
        <input type="text" name="contrasena" placeholder="contrasena" class="input_text">
        <input type="text" name="telefono" placeholder="telefono" class="input_text">
    </div>

    <div class ="btn_group">
<a href="index_usuario.php" class="btn btn_danger">Cancelar</a>
<input type="submit" name="guardar" value="guardar" class="btn btn_primary">
    </div>
        </form>
        </div>
        
</body>
</html>