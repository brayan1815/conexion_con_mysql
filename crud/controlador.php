<?php
require('conexion.php');

$db= new Conexion();
$conexion = $db -> getConexion();

$nombre_usuario=$_POST['nombre_usuario'];
$apellido_usuario=$_POST['apellido_usuario'];
$correo_usuario=$_POST['correo_usuario'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$genero_id=$_POST['genero_id'];
$ciudad_id=$_POST['ciudad_id'];
$lenguajes = $_POST['lenguaje_id'];

$sql= "INSERT INTO USUARIOS (nombre_usuario,apellido_usuario,correo_usuario,fecha_nacimiento,genero,ciudad) VALUES 
(:nombre_usuario,:apellido_usuario,:correo_usuario,:fecha_nacimiento,:genero_id,:ciudad_id)";

$stm = $conexion->prepare($sql);

$stm->bindParam(":nombre_usuario",$nombre_usuario);
$stm->bindParam(":apellido_usuario",$apellido_usuario);
$stm->bindParam(":correo_usuario",$correo_usuario);
$stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);
$stm->bindParam(":genero_id",$genero_id);
$stm->bindParam(":ciudad_id",$ciudad_id);

$usuario= $stm->execute();

$id_usuario= $conexion->lastInsertId();

var_dump($id_usuario);

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

$sql2= "INSERT INTO lenguaje_usuario(id_usuario,id_lenguaje) VALUES (:id_usuario,:id_lenguaje)";
$stm2 = $conexion->prepare($sql2);
foreach ($lenguajes as $key => $value) {
    $stm2->bindParam(":id_usuario",$id_usuario);
    $stm2->bindParam(":id_lenguaje",$value);
    $stm2->execute();
}
//aaaaaaaaaaaaaaaaaaa