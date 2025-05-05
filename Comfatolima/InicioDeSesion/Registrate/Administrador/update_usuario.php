<?php
include_once 'conexion.php';

if(isset($_GET['id'])){
    $id=(int) $_GET['id'];

    $buscar_id=$conn ->prepare('SELECT * FROM usuario WHERE id=:id');

    $buscar_id->execute(array('id' => id));

    $resultado=$buscar_id->fetch();
}else{
    header('location: index_usuario.php');
}
if(isset($_POST['guardar'])){
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $login=$_POST['login'];
    $contrasena=$_POST['contrasena'];
    $telefono=$_POST['telefono'];

 if(!empty($id) && !empty($nombre) && !empty($apellido) && !empty($direccion) && !empty($correo) && !empty($login) && !empty($contrasena) && !empty($telefono)  );{ 
    $consulta_update=$conn->prepare(' UPDATE usuario SET 
    nombre=:nombre, 
    apellido=:apellido, 
    direccion=:direccion, 
    correo=:correo, 
    login=:login, 
    contrasena=:contrasena, 
    telefono=:telefono 
    
    WHERE id=id;');

    $consulta_update ->execute(array(
        ':nombre' =>$nombre,
        ':apellido' =>$apellido,
        ':direccion' =>$direccion,
        ':correo' =>$correo,
        ':login' =>$login,
        ':contrasena' =>$contrasena,
        ':telefono' =>$telefono,
        ':id' =>$id
    ));
    header('location: index_usuario.php');
 }
 } else{
        echo "<script> alert('los campos estan vacios')</script>";
    }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar Informacion</title>
</head>
<body>
    <div class="contenedor">
        <h2>Editar Informacion</h2>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="id" value="<?php if ($resultado) echo $resultado['id']; ?>" class="input_text">
                <input type="text" name="nombre" value="<?php if ($resultado) echo $resultado['nombre']; ?>" class="input_text">

            <div class="form-group">
                <input type="text" name="apellido" value="<?php if ($resultado) echo $resultado['apellido']; ?>" class="input_text">
                <input type="text" name="direccion" value="<?php if ($resultado) echo $resultado['direccion']; ?>" class="input_text">

            <div class="form-group">
                <input type="text" name="correo" value="<?php if ($resultado) echo $resultado['correo']; ?>" class="input_text">
                <input type="text" name="login" value="<?php if ($resultado) echo $resultado['login']; ?>" class="input_text">

            <div class="form-group">
                <input type="text" name="contrasena" value="<?php if ($resultado) echo $resultado['contrasena']; ?>" class="input_text">
                <input type="text" name="telefono" value="<?php if ($resultado) echo $resultado['telefono']; ?>" class="input_text">

</div>
<div class="btn_group">
    <a href="index_usuario.php" class="btn btn_danger">cancelar</a>
    <input type="submit" name="guardar" value="guardar" class="btn btn_primary">
</div>
</form>
</div>
</body>
</html>