<?php

require('conexion.php');

$db= new Conexion();
$conexion = $db -> getConexion();

$id_usuario = $_REQUEST['id'];

$sql_elimi="DELETE from lenguaje_usuario WHERE id_usuario=:id_usuario";
$stm_elimi = $conexion->prepare($sql_elimi);
$stm_elimi->bindParam(":id_usuario",$id_usuario);
$stm_elimi->execute();

$sql_elim2="DELETE FROM usuarios WHERE id_usuario=:id_usuario";
$stm_elimi2 = $conexion->prepare($sql_elim2);
$stm_elimi2->bindParam(":id_usuario",$id_usuario);
$stm_elimi2->execute();

header("Location: vista.php");