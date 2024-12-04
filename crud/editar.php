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

$usuario_id = $_REQUEST['id'];

$sql4="SELECT * FROM usuarios WHERE id_usuario = $usuario_id";
$bandera4=$conexion->prepare($sql4);
$bandera4->execute();
$usuario= $bandera4->fetch();

//print_r($usuario['id_usuario']);
//print_r($usuario['apellido_usuario']);
//die();



$sql5="SELECT * FROM lenguaje_usuario WHERE id_usuario = $usuario_id";
$bandera5=$conexion->prepare($sql5);
$bandera5->execute();
$len_usu= $bandera5->fetchAll();

?>
<link rel="stylesheet" href="estilos.css ">
<form action="contro_actu.php" method="POST" class="formulario">
    <div class="formulario__info">
        <div class="formulario__info formulario__inputTex">
            <label for="nombre" class="formulario__info formulario__label">Nombre: </label>
            <input type="text" id="nombre" name="nombre_usuario" value="<?=$usuario['nombre_usuario']?>" required pattern="[a-zA-Z]+" 
            autocomplete="off" class="formulario__info formulario__inTex" placeholder="Ingrese su nombre">
        </div>

        <input type="hidden" name="id_usuario" value="<?=$usuario_id?>">
        <br>
        <div class="formulario__info formulario__inputTex">
            <label for="apellidio" class="formulario__info formulario__label">Apellido: </label>
            <input type="text" id="apellido" name="apellido_usuario" value="<?=$usuario['apellido_usuario']?>" required pattern="[a-zA-Z]+" 
            class="formulario__info formulario__inTex" placeholder="Ingrese su apellido">
        </div>
        <br>
        <div class="formulario__info formulario__inputTex">
            <label for="correo" class="formulario__info formulario__label">Correo: </label>
            <input type="text" id="correo" name="correo_usuario" value="<?=$usuario['correo_usuario']?>" required pattern="[a-zA-Z1-9]+@[A-Za-z]+[.][a-z]+"
            class="formulario__info formulario__inTex" placeholder="Ingrese su correo">
        </div>
        <br>
        <div class="formulario__info formulario__inputfech">
            <label for="nacimiento">Fecha de nacimiento: </label>
            <input type="date" id="nacimiento" name="fecha_nacimiento" value="<?=$usuario['fecha_nacimiento']?>" required class="formulario__info formulario__fecha">
        </div>
        <!-- <input type="hidden" name="id" value=""> -->
        <br>
        <div class="formulario__info formulario__fecha_input">
        <label for="ciudad_id">Ciudad</label>
        <select name="ciudad_id" id="ciudad_id" required class="formulario__info formulario_ciud">
            <?php
            foreach($ciudades as $key => $ciu){
            ?>
                <option id="<?=$ciu['id_ciudad']?>" value="<?=$ciu['id_ciudad']?>"
                <?php if($usuario['ciudad']==$ciu['id_ciudad']){ ?>
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
        <div class="formulario__info formulario__sexo">
            <?php
            foreach($generos as $key => $gen){?>
                <input type="radio" name="genero_id" id="gen_<?=$gen['id_genero']?>" value="<?=$gen['id_genero']?>" required class="input_radio"
                <?php if($usuario['genero']== $gen['id_genero']){  ?> 
                    checked <?php
                } ?> >
                <label for="gen_<?=$gen['id_genero']?>" class="textsex"><?=$gen['genero']?></label>

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
            foreach($lenguajes as $key => $len){?>
                <input class="input_checbox" type="checkbox" name="lenguaje_id[]" id="len_<?=$len['id_lenguaje']?>" value="<?=$len['id_lenguaje']?>"
                <?php foreach ($len_usu as $key => $l){
                    if($len['id_lenguaje']==$l['id_lenguaje']){ ?>
                        
                    checked
                    <?php }
                    
                } ?> >
                <label for="len_<?=$len['id_lenguaje']?>" class="textlen"><?=$len['nombre_lenguaje']?></label>

            <?php
            }
            ?> 
        </div>
  
    </div>
        <?php
    ?>
    </div>
        
    <br>
       <input type="submit" value="Actualizar" class="boton_guardar">
        <!-- <a href="contro_actu.php?id=<?=$usuario_id?>">a</a> -->
    <br>

</form> 
<?php

?>

<!-- kgh -->