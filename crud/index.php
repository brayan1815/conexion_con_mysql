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
<link rel="stylesheet" href="estilos.css">

<form action="controlador.php" method="post" class="formulario">
    <div class="formulario__info">
        <div class="formulario__info formulario__inputTex">
            <label for="nombre" class="formulario__info formulario__label">Nombre: </label>
            <input autocomplete="off" type="text" id="nombre" name="nombre_usuario" required pattern="[a-zA-Z]+" class="formulario__info formulario__inTex"
            placeholder="Ingrese su nombre">
        </div>
        <br>
        <div class="formulario__info formulario__inputTex">
            <label for="apellidio" class="formulario__info formulario__label">Apellido: </label>
            <input autocomplete="off" type="text" id="apellido" name="apellido_usuario" required pattern="[a-zA-Z]+" class="formulario__info formulario__inTex"
            placeholder="Ingrese su apellido">
        </div>
        <br>
        <div class="formulario__info formulario__inputTex">
            <label for="correo" class="formulario__info formulario__label">Correo: </label>
            <input autocomplete="off" type="text" id="correo" name="correo_usuario" required pattern="[a-zA-Z1-9]+@[A-Za-z]+[.][a-z]+" class="formulario__info formulario__inTex"
            placeholder="Ingrese su correo">
        </div>
        <br>
        <div class="formulario__info formulario__inputfech">
            <label for="nacimiento">Fecha <data value=""></data>e nacimiento: </label>
            <input type="date" id="nacimiento" name="fecha_nacimiento" required class="formulario__info formulario__fecha">
        </div>
        <br>
        <div class="formulario__info formulario__fecha_input">
            <label for="ciudad_id">Ciudad</label>
            <select name="ciudad_id" id="ciudad_id" required class="formulario__info formulario_ciud">
                <?php
                foreach($ciudades as $key => $value){
                ?>
                    <option id="<?=$value['id_ciudad']?>" value="<?=$value['id_ciudad']?>" class="option">
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
            <div class="formulario__info formulario__sexo">
            <?php
                foreach($generos as $key => $value){?>
                    
                        <input type="radio" name="genero_id" id="gen_<?=$value['id_genero']?>" value="<?=$value['id_genero']?>" required class="input_radio">
                        <label for="gen_<?=$value['id_genero']?>" class="textsex"><?=$value['genero']?></label>

                    
                <?php
                }
                ?>  
            </div>   
        </div>
        <br>
        <div>
            <label for="lenguaje_id">Lenguajes: </label>
            <div class="formulario__lenguajes">
            <?php
                foreach($lenguajes as $key => $value){?>
                    
                    <input type="checkbox" name="lenguaje_id[]" id="len_<?=$value['id_lenguaje']?>" value="<?=$value['id_lenguaje']?>" class="input_checbox">
                    <label for="len_<?=$value['id_lenguaje']?>" class="textlen"><?=$value['nombre_lenguaje']?></label>
                <?php
                }
                ?>
            </div>
            
            
        </div>
    </div>
    
    <br>
    <button class="boton_guardar">GUARDAR</button>
    <br>

</form>



