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
if (isset($_REQUEST["id"])){
    $idPaciente = $_REQUEST["id"];

    include "../conexion.php";

    //buscamos los datos del paciente que se va a editar
    $sql = "select * from juanf_A_pacientes where idPaciente = ".$idPaciente;
    $rs = ejecutar($sql);
    $datos = mysqli_fetch_array($rs);
    
    //recuperamos los datos del recordset obtenidos
    
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $email = $datos["email"];
    $genero = $datos["genero"];
    $telefono = $datos["telefono"];
    $fechaNacimiento = $datos["fechaNacimiento"];
    $escolaridad = $datos["escolaridad"];
    $diagonostico = $datos["diagnostico"];
    $enteraste = $datos["comoEnteraste"];
    $pw = $datos["pw"];

    //vamos a separar el string de la fechaNacimiento en año, mes y día. Al momento la fecha tiene este formato:
    //  yyyy-mm-dd (por ejemplo 1985-08-14)
    //vamos a usar la función de substr (substring) de php para rescatar año, mes y día

    $anio = substr($fechaNacimiento, 0, 4);
    $mes = substr($fechaNacimiento, 5, 2);
    $dia = substr($fechaNacimiento, 8, 2);

    
?>

<div class="header">
<h1>Pacientes</h1>
</div>

<section class="listaResultados">
    <form method = "post" action = "editarPaciente_xt.php" id="f1">
    <input type="hidden" name="idPaciente" value="<?php echo $idPaciente;?>" />
    
        
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
                    <option value="M" <?php if ($genero == "M") echo "selected";?> >Masculino</option>
                    <option value="F" <?php if ($genero == "F") echo "selected";?> >Femenino</option>
                    <option value="O" <?php if ($genero == "O") echo "selected";?> >Otro</option>
                </select>
            </div>
                
            <div class="iconos"><i class="fas fa-envelope"></i></div>
            <div class="formulario"><input type="text" placeholder="email" name="email" class="camposForm" id="c4" value="<?php echo $email;?>"/></div>

            <div class="iconos"><i class="fas fa-phone"></i></div>
            <div class="formulario"><input type="text" placeholder="telefono" name="telefono" class="camposForm" id="c7" value="<?php echo $telefono;?>"/></div>

            <div class="iconos"><i class="fas fa-key"></i></div>
            <div class="formulario">
                <input type="password" placeholder="ingrese el password" name="pw" class="camposForm" id="p1" value="<?php echo $pw; ?>"/>
                <button type="button" onClick="mostrarOcultarPW('p1')" class="mostrarPassword" id="bp1"><i class="fas fa-eye"></i></button>
            </div>

            <div class="iconos"><i class="fas fa-key"></i></div>
            <div class="formulario">
                <input type="password" placeholder="confirme el password" name="pw2" class="camposForm" id="p2" value="<?php echo $pw; ?>" />
                <button type="button" onClick="mostrarOcultarPW('p2')" class="mostrarPassword" id="bp2"><i class="fas fa-eye"></i></button>
            </div>
                    
            
            <div class="iconos"><i class="far fa-calendar-alt"></i></div>
            <div class="formularioFN">Fecha Nacimiento:
                <select name="dia" class="campoSelectDia" id="c50">
                    <option value="">Día</option>
                    <?php 
                    for ($i=1; $i<32; $i++){
                        if ($dia == $i){
                            echo "<option value='".$i."' selected>".$i."</option>";
                        }else{
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                    }
                    ?>
                </select>

                <select name="mes" class="campoSelectMes" id="c51">
                    <option value="">Mes</option>
                    <option value="01" <?php if ($mes == "01") echo "selected";?> >enero</option>
                    <option value="02" <?php if ($mes == "02") echo "selected";?> >febrero</option>
                    <option value="03" <?php if ($mes == "03") echo "selected";?> >marzo</option>
                    <option value="04" <?php if ($mes == "04") echo "selected";?> >abril</option>
                    <option value="05" <?php if ($mes == "05") echo "selected";?> >mayo</option>
                    <option value="06" <?php if ($mes == "06") echo "selected";?> >junio</option>
                    <option value="07" <?php if ($mes == "07") echo "selected";?> >julio</option>
                    <option value="08" <?php if ($mes == "08") echo "selected";?> >agosto</option>
                    <option value="09" <?php if ($mes == "09") echo "selected";?> >septiembre</option>
                    <option value="10" <?php if ($mes == "10") echo "selected";?> >octubre</option>
                    <option value="11" <?php if ($mes == "11") echo "selected";?> >noviembre</option>
                    <option value="12" <?php if ($mes == "12") echo "selected";?> >diciembre</option>
                </select>

                <select name="anio" class="campoSelectAnio" id="c52">
                    <option value="">Año</option>
                    <?php 
                    for ($i=1920; $i<=2050; $i++){
                        if ($anio == $i){
                            echo "<option value='".$i."' selected>".$i."</option>";
                        }else{
                            echo "<option value='".$i."'>".$i."</option>";
                        }
                    }
                    ?>
                </select>

            </div>

            <div class="iconos"><i class="fas fa-university"></i></div>
            <div class="formulario">
                <select name="escolaridad" class="campoSelect" id="c6">
                    <option value="">--seleccione escolaridad--</option>
                    <option value="Sin educacion" <?php if ($escolaridad == "Sin educacion") echo "selected";?> >Sin educación</option>
                    <option value="Primaria" <?php if ($escolaridad == "Primaria") echo "selected";?> >Primaria</option>
                    <option value="Secundaria" <?php if ($escolaridad == "Secundaria") echo "selected";?> >Secundaria</option>
                    <option value="Preparatoria" <?php if ($escolaridad == "Preparatoria") echo "selected";?> >Preparatoria</option>
                    <option value="Tecnico" <?php if ($escolaridad == "Tecnico") echo "selected";?> >Técnico</option>
                    <option value="Licenciatura" <?php if ($escolaridad == "Licenciatura") echo "selected";?> >Licenciatura</option>
                    <option value="Maestria" <?php if ($escolaridad == "Maestria") echo "selected";?> >Maestría</option>
                    <option value="Doctorado" <?php if ($escolaridad == "Doctorado") echo "selected";?> >Doctorado</option>
                </select>
            </div>
            
            <div class="iconos"><i class="fas fa-file-alt"></i></div>
            <div class="formulario"><textarea name="diagnostico" rows="5" cols="40" id="c8"><?php echo $diagonostico; ?></textarea></div>

            <div class="iconos"><i class="far fa-comments"></i></div>
            <div class="formulario"><textarea name="enteraste" rows="3" cols="40" id="c9"><?php echo $enteraste; ?></textarea></div>

            <div class="iconos"></div>
            <div class="formulario">
                <button type="button" class="botonFormulario" onClick="validarFormularioPaciente()">Ingresar</button>
                
                <button type="button" class="botonFormulario" onClick="cancelar()">Cancelar</button>

            
            <div class="iconos"></div>
            <div class="formulario"><span id="msj" class="mensaje"></span></div>


        </div>
    </form>

</section>

 <?php
}else{
    echo "<script language='javascript'>";
    echo "window.location.assign('index.php');";
    echo "</script>";

}

?>
</body>
</html>