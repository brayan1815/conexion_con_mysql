<?php
require('conexion.php');

$db= new Conexion();
$conexion = $db -> getConexion();

$id_usuario=$_REQUEST['id_usuario'];
$nombre_usuario=$_REQUEST['nombre_usuario'];
$apellido_usuario=$_REQUEST['apellido_usuario'];
$correo_usuario=$_REQUEST['correo_usuario'];
$fecha_nacimiento=$_REQUEST['fecha_nacimiento'];
$genero_id=$_REQUEST['genero_id'];
$ciudad_id=$_REQUEST['ciudad_id'];
$lenguajes = $_REQUEST['lenguaje_id'];

$sqlActu="UPDATE usuarios set nombre_usuario=:nombre_usuario,apellido_usuario=:apellido_usuario,correo_usuario=:correo_usuario,fecha_nacimiento=:fecha_nacimiento,genero=:genero_id,ciudad=:ciudad_id WHERE id_usuario=:id_usuario";

$stmActu = $conexion->prepare($sqlActu);

$stmActu->bindParam(":nombre_usuario",$nombre_usuario);
$stmActu->bindParam(":apellido_usuario",$apellido_usuario);
$stmActu->bindParam(":correo_usuario",$correo_usuario);
$stmActu->bindParam(":fecha_nacimiento",$fecha_nacimiento);
$stmActu->bindParam(":genero_id",$genero_id);
$stmActu->bindParam(":ciudad_id",$ciudad_id);
$stmActu->bindParam(":id_usuario",$id_usuario);

$stmActu->execute();

$sql_elimi="DELETE FROM lenguaje_usuario WHERE id_usuario=:id_usuario";
$stm_elimi = $conexion->prepare($sql_elimi);

$stm_elimi->bindParam("id_usuario",$id_usuario);
$stm_elimi->execute();

$sql_insertlen= "INSERT INTO lenguaje_usuario(id_usuario,id_lenguaje) VALUES (:id_usuario,:id_lenguaje)";
$stm2_insertlen = $conexion->prepare($sql_insertlen);
foreach ($lenguajes as $key => $value) {
    $stm2_insertlen->bindParam(":id_usuario",$id_usuario);
    $stm2_insertlen->bindParam(":id_lenguaje",$value);
    $stm2_insertlen->execute();
}