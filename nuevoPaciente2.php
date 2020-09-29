<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://kit.fontawesome.com/5637dd924f.js" crossorigin="anonymous"></script>
    <script src="./scripts.js"></script> 
</head>
<body>
<?php
//checamos si se ha enviado un formulario con un campo error porque el email ya está registrado
if (isset($_POST["error"])){
    // recuperamos los datos enviados por PHP
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $genero = $_POST["genero"];
?>

<div class="header">
<h1>Pacientes</h1>
</div>

<section class="listaResultados">
    <form method = "post" action = "nuevoPaciente_xt.php" id="f1">
        
        <div class="form-container"> 
            
            <div class="titulo">Registro / Edición de Pacientes</div>

            <div class="iconos"><i class="fas fa-user"></i></div>
            <div class="formulario"><input type="text" placeholder="nombre" name="nombre" class="camposForm" id="c1" value="<?php echo $nombre;?>"/></div>

            <div class="iconos"><i class="fas fa-user"></i></div>
            <div class="formulario"><input type="text" placeholder="apellido" name="apellido" class="camposForm" id="c2" value="<?php echo $apellido;?>"/></div>

            <div class="iconos"><i class="fas fa-venus-mars"></i></div>
            <div class="formulario">
                <select name="genero" class="campoSelect" id="c3">
                    <option value="">--seleccione el género--</option>
                    <option value="M" <?php if ($genero == "M") echo "selected";?>>Masculino</option>
                    <option value="F" <?php if ($genero == "F") echo "selected";?>>Femenino</option>
                    <option value="O" <?php if ($genero == "O") echo "selected";?>>Otro</option>
                </select>
            </div>
                
            <div class="iconos"><i class="fas fa-envelope"></i></div>
            <div class="formulario"><input type="text" placeholder="email" name="email" class="camposFormError" id="c4" value="<?php echo $email;?>"/></div>

            <div class="iconos"><i class="fas fa-phone"></i></div>
            <div class="formulario"><input type="text" placeholder="telefono" name="telefono" class="camposForm" id="c7"/></div>

            <div class="iconos"><i class="far fa-calendar-alt"></i></div>
            <div class="formularioFN">Fecha Nacimiento:
                <select name="dia" class="campoSelectDia" id="c50">
                    <option value="">Día</option>
                    <?php 
                    for ($i=1; $i<32; $i++){
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                </select>

                <select name="mes" class="campoSelectMes" id="c51">
                    <option value="">Mes</option>
                    <option value="01">enero</option>
                    <option value="02">febrero</option>
                    <option value="03">marzo</option>
                    <option value="04">abril</option>
                    <option value="05">mayo</option>
                    <option value="06">junio</option>
                    <option value="07">julio</option>
                    <option value="08">agosto</option>
                    <option value="09">septiembre</option>
                    <option value="10">octubre</option>
                    <option value="11">noviembre</option>
                    <option value="12">diciembre</option>
                </select>

                <select name="anio" class="campoSelectAnio" id="c52">
                    <option value="">Año</option>
                    <?php 
                    for ($i=1920; $i<=2050; $i++){
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                </select>

            </div>

            <div class="iconos"><i class="fas fa-university"></i></div>
            <div class="formulario">
                <select name="escolaridad" class="campoSelect" id="c6">
                    <option value="">--seleccione escolaridad--</option>
                    <option value="Sin educacion">Sin educación</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Preparatoria">Preparatoria</option>
                    <option value="Tecnico">Técnico</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Mastria">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                </select>
            </div>
            
            <div class="iconos"><i class="fas fa-file-alt"></i></div>
            <div class="formulario"><textarea name="diagnostico" rows="5" cols="40" id="c8"></textarea></div>

            <div class="iconos"><i class="far fa-comments"></i></div>
            <div class="formulario"><textarea name="enteraste" rows="3" cols="40" id="c9"></textarea></div>

            <div class="iconos"></div>
            <div class="formulario">
                <button type="button" class="botonFormulario" onClick="validarFormularioPaciente()">Ingresar</button>
                
                <button type="button" class="botonFormulario" onClick="cancelar()">Cancelar</button>
            </div>

            
            <div class="iconos"></div>
            <div class="formulario"><span id="msj" class="mensaje">
            El email ingresado ya está registrado en la base de datos
            </span></div>


        </div>
    </form>

</section>

<?php
}else{
    //redireccionamos la página a nuevoPaciente.php
    echo "<script language='javascript'>";
    echo "window.location.assign('nuevoPaciente.php');";
    echo "</script>";
}
?>
    
</body>
</html>