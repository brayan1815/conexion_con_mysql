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

$sql4="SELECT * FROM usuarios";
$bandera4=$conexion->prepare($sql4);
$bandera4->execute();
$usuarios= $bandera4->fetchAll();
?>


<form action="controlador.php" method="post">
    <div>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre_usuario">
        </div>
        <br>
        <div>
            <label for="apellidio">Apellido: </label>
            <input type="text" id="apellido" name="apellido_usuario">
        </div>
        <br>
        <div>
            <label for="correo">Correo: </label>
            <input type="text" id="correo" name="correo_usuario">
        </div>
        <br>
        <div>
            <label for="nacimiento">Fecha <data value=""></data>e nacimiento: </label>
            <input type="date" id="nacimiento" name="fecha_nacimiento">
        </div>
        <br>
    </div>
    <br>
    <div>
        <label for="ciudad_id">Ciudad</label>
        <select name="ciudad_id" id="ciudad_id">
            <?php
            foreach($ciudades as $key => $value){
            ?>
                <option id="<?=$value['id_ciudad']?>" value="<?=$value['id_ciudad']?>">
                    <?=$value['ciudad']?>
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
            foreach($generos as $key => $value){?>
                <label for="gen_<?=$value['id_genero']?>"><?=$value['genero']?></label>
                <input type="radio" name="genero_id" id="gen_<?=$value['id_genero']?>" value="<?=$value['id_genero']?>">
            <?php
            }
            ?>     
    </div>
    <br>
    <div>
        <label for="lenguaje_id">Lenguajes: </label>
        <?php
            foreach($lenguajes as $key => $value){?>
                <label for="len_<?=$value['id_lenguaje']?>"><?=$value['nombre_lenguaje']?></label>
                <input type="checkbox" name="lenguaje_id[]" id="len_<?=$value['id_lenguaje']?>" value="<?=$value['id_lenguaje']?>">
            <?php
            }
            ?>
        
        
    </div>
    <br>
    <button>GUARDAR</button>
    <br>

</form>



