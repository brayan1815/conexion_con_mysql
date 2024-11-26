<?php

require('conexion.php');

$db= new Conexion();
$conexion = $db->getConexion();

$sql="SELECT * FROM ciudades";
$bandera=$conexion->prepare($sql);
$bandera->execute();
$ciudades= $bandera->fetchAll();

$sql2="SELECT * FROM generos";
$bandera2=$conexion->prepare($sql2);
$bandera2->execute();
$generos= $bandera2->fetchAll();

$sql3="SELECT * FROM lenguajes";
$bandera3=$conexion->prepare($sql3);
$bandera3->execute();
$lenguajes= $bandera3->fetchAll();

$user_id=$_GET['id'];

$sql4="SELECT * FROM usuarios WHERE id_usuario = $user_id";
$bandera4=$conexion->prepare($sql4);
$bandera4->execute();
$usuarios= $bandera4->fetchAll();

$sql5="SELECT * FROM lenguaje_usuario WHERE $user_id= id_usuario";
$bandera5=$conexion->prepare($sql5);
$bandera5->execute();
$len_usu= $bandera5->fetchAll();

?>
<form action="contro_actu.php" method="post">
    <?php foreach($usuarios as $key => $value){ ?>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre_usuario" value="<?=$value['nombre_usuario']?>">
        </div>
        <br>
        <div>
            <label for="apellidio">Apellido: </label>
            <input type="text" id="apellido" name="apellido_usuario" value="<?=$value['apellido_usuario']?>">
        </div>
        <br>
        <div>
            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo_usuario" value="<?=$value['correo_usuario']?>">
        </div>
        <br>
        <div>
            <label for="nacimiento">Fecha de nacimiento: </label>
            <input type="date" id="nacimiento" name="fecha_nacimiento" value="<?=$value['fecha_nacimiento']?>">
        </div>
        <br>
        <div>
        <label for="ciudad_id">Ciudad</label>
        <select name="ciudad_id" id="ciudad_id">
            <?php
            foreach($ciudades as $key => $ciu){
            ?>
                <option id="<?=$ciu['id_ciudad']?>" value="<?=$ciu['id_ciudad']?>"
                <?php if($value['ciudad']==$ciu['id_ciudad']){ ?>
                selected <?php } ?> >
                    <?=$ciu['ciudad']?>
                </option>
            <?php
            }
            ?>
        </select>       
    </div>
    <br>
    <div>
        <label for="genero_id">Genero: </label>
        <?php
            foreach($generos as $key => $gen){?>
                <label for="gen_<?=$gen['id_genero']?>"><?=$gen['genero']?></label>
                <input type="radio" name="genero_id" id="gen_<?=$gen['id_genero']?>" value="<?=$gen['id_genero']?>"
                <?php if($value['genero']== $gen['id_genero']){  ?>
                    checked <?php
                } ?> >
            <?php
            }
            ?>     
    </div>
    <br>
    <div>
        <label for="lenguaje_id">Lenguajes: </label>
        <?php
            foreach($lenguajes as $key => $len){?>
                <label for="len_<?=$len['id_lenguaje']?>"><?=$len['nombre_lenguaje']?></label>
                <input type="checkbox" name="lenguaje_id[]" id="len_<?=$len['id_lenguaje']?>" value="<?=$len['id_lenguaje']?>"
                <?php foreach ($len_usu as $key => $l){
                    if($len['id_lenguaje']==$l['id_lenguaje']){ ?>
                        
                    checked
                    <?php }
                    
                } ?> >
            <?php
            }
            ?>   
    </div>
        <?php
    }?>

</form>