<?php
require('conexion.php');

$db= new Conexion();
$conexion = $db->getConexion();

$sql4="SELECT * FROM usuarios";
$bandera4=$conexion->prepare($sql4);
$bandera4->execute();
$usuarios= $bandera4->fetchAll();
?>

<table border="solid 1px">
        <tr>
            <td>id_usuario</td>
            <td>Nombre_usuario</td>
            <td>Apellido_usuario</td>
            <td>correo_usuario</td>
            <td>fecha_nacimiento</td>
            <td>Genero</td>
            <td>Ciudad</td>
        </tr>
        <?php foreach($usuarios as $key => $value){
            ?>
            <tr>
                <td><?=$value['id_usuario']?></td>
                <td><?=$value['nombre_usuario']?></td>
                <td><?=$value['apellido_usuario']?></td>
                <td><?=$value['correo_usuario']?></td>
                <td><?=$value['fecha_nacimiento']?></td>
                <td><?=$value['genero']?></td>
                <td><?=$value['ciudad']?></td>
                <td><a href="editar.php?id=<?=$value['id_usuario']?>">Actualizar</a></td>
                <td><a href="eliminar.php?id=<?=$value['id_usuario']?>">eliminar</a></td>
            </tr>

            <?php
        }?>
    </table>