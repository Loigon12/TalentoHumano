<?php
include_once 'conexion.php';

     if(isset($_POST['guardar'])){
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $direccion=$_POST['direccion'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        

        if (!empty($id) && !empty($nombre)&& !empty($apellidos) && !empty($direccion ) &&  !empty($email)  && !empty($password) );
        
        $consulta_insert = $conn->prepare('INSERT INTO usuarios (id,nombre,apellidos,direccion,email,password)
        VALUES(:id,:nombre,:apellidos,:direccion,:email,:password)');
        $consulta_insert ->execute (array(

            ':id' =>$id,
            ':nombre' =>$nombre,
            ':apellidos'=>$apellidos,
            ':direccion'=>$direccion,
            ':email'=>$email,
            ':password'=>$password

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
    <link rel="stylesheet" href="css/styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor">
        <h2>REGISTRO</h2>
        <form action="" method="POST" class="speaker-form">

        <div class="form-row">
            <label for="id">id</label>
            <input type="text" name="id" placeholder="id" class="input_text"> 
        </div>

            <div class="form-row">
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" placeholder="nombre" class="input_text"> 
        </div>

            <div class="form-row">
            <label for="apellidos">apellidos</label>
           <input type="text" name="apellidos" placeholder="apellidos" class="input_text">
           </div>

           <div class="form-row">
           <label for="direccion">direccion</label>
        <input type="text" name="direccion" placeholder="direccion" class="input_text">
        </div>

        <div class="form-row">
        <label for="email">email</label>
        <input type="text" name="email" placeholder="email" class="input_text">
        </div>

        <div class="form-row">
        <label for="password">password</label>
        <input type="text" name="password" placeholder="password" class="input_text">
    </div>
    
    <fieldset class="legacy-form-row">
                            <legend>¿Cual es tu talento?</legend>
                            <input id="talk-type-1" name="talk-type" type="radio" value="baile" />
                            <label for="talk-type-1" class="radio-label">baile</label>
                            <input id="talk-type-2" name="talk-type" type="radio" value="musico" />
                            <label for="talk-type-2" class="radio-label">musico</label>
                            <input id="talk-type-3" name="talk-type" type="radio" value="escritura" />
                            <label for="talk-type-3" class="radio-label">escritura</label>
                            <input id="talk-type-4" name="talk-type" type="radio" value="dibujante" />
                            <label for="talk-type-4" class="radio-label">dibujante</label>
                            <input id="talk-type-5" name="talk-type" type="radio" value="rapear/improvisar" />
                            <label for="talk-type-5" class="radio-label">rapear/improvisar</label>
                        </fieldset>
                        <div class="form-row">
                            <label for="abstract">¿Porque quieres entrar?</label>
                            <textarea id="abstract" name="textarea"></textarea>
                            <div class="instrucciones">Describe con tus palabras en 500 caracteres maximo</div>
                            
                        </div>
    

<div class="form-row">
<input type="submit" name="guardar" value="guardar" class="btn btn_pri">
    </div>
    <a href="index_usuario.php" class="btn btn_danger">Cancelar</a>
        </form>
        </div>
        
</body>
</html>