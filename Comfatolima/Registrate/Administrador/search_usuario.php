<?php
include_once 'conexion.php';
$sentencia_select= $conn-> prepare('SELECT *FROM usuarios ORDER BY id DESC');
$sentencia_select -> execute();
$resultado = $sentencia_select->fetchALL();

if(isset($_POST['btn_buscar'])){
    $buscar_text=$_POST['buscar'];
    $select_buscar=$conn->prepare('SELECT *FROM usuarios WHERE nombre LIKE :campo OR id LIKE :campo;');
    $select_buscar->execute(array('campo' => "%" .$buscar_text. "%"));
    $resultado=$select_buscar->fetchALL();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <div class="barra_buscador">
        <form action="" class="formulario" method="post">
            <input type="text" name="buscar" placeholder="Buscar usuario"
            value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class= 'input_text'>
            <input type="submit" class="btn" name="btn_buscar" value="buscar">
            <a href="index_usuario.php" class="btn btn_nuevo">Nuevo</a>
</form>
<div class= "container">
<table>
    <tr class="head">
    <td>id</td>
    <td>nombre</td>
    <td>apellido</td>
    <td>direccion</td>
    <td>correo</td>
    <td>login</td>
    <td>contrasena</td>
    <td>telefono</td>
    <td colspan="2">Accion</td>
</tr>
<?php foreach($resultado as $fila):?>
    <tr >
        <td><?php echo $fila['id']; ?></td>
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['apellido']; ?></td>
        <td><?php echo $fila['direccion']; ?></td>
        <td><?php echo $fila['correo']; ?></td>
        <td><?php echo $fila['login']; ?></td>
        <td><?php echo $fila['contrasena']; ?></td>
        <td><?php echo $fila['telefono']; ?></td>
<td><a href="uptade_usuario.php?id=<?php echo $fila["id"]; ?>" class="btn_uptade" > editar </a><td>
<td><a href="delete_usuario.php?id=<?php echo $fila["id"]; ?>" class="btn_delete" > eliminar </a><td>

</tr>
<?php endforeach ?>
</table>
</div>


</body>
</html>