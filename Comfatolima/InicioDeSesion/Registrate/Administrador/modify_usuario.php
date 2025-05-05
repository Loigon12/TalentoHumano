<?php
include_once 'conexion.php';
if(isset($_GET['id'])){
    $id=(int) $_GET['id'];
    $delete =$conn ->prepare('DELETE FROM usuario WHERE id=:id');
    $delete ->execute(array('id' => id));
    header('location: index_usuario.php');
}else{
    header('location: index_usuario.php');
}

if(isset($_POST['guardar'])){

    $nombre=
}
?>