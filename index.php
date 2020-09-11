<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://kit.fontawesome.com/5637dd924f.js" crossorigin="anonymous"></script>
    <script src="./scripts.js"></script>
</head>
<body>
<div class="header">
<h1>Pacientes</h1>
<button type="button">Nuevo Paciente</button>
</div>
<?php include "../conexion.php"; ?>

<section class="botonera">
    <?php
        for ($i=65; $i<=90; $i++){
            echo "<button type='button' onClick=mostrarResultados('".chr($i)."')>".chr($i)."</button>";
        }

    ?>
</section>

<section class="busquedas">
    <form method="post" action="">
        <input type="text" class="campo" />
        <button type="submit" class="boton" onClick="mostrarResultados()"><i class="fas fa-search"></i></button>
    </form>
</section>

<section class="listaResultados">
    <div class = "contenedor" id="contenedor">
        <?php
        //checamos si se ha enviado un querystring con una letra para buscar apellidos con esa letra
        if (isset($_REQUEST["letra"])){
            //recuperar la letra
            $letra = $_REQUEST["letra"];
            //hacemos una búsqueda de apellidos que inicien con la letra seleccionada
            $sql = "select idPaciente, nombre, apellido from juanf_A_pacientes where apellido like '".$letra."%'";
           
            $rs = ejecutar($sql);
           
            //checamos si el recordset tiene registros (tiene filas)
            if (mysqli_num_rows($rs) == 0){
                echo '<div id="r1">No se encontraron registros con la letra seleccionada</div>';
            }else{
                //desplegamos los registros
                echo ' <div id="r1">Registros encontrados: </div>';
                echo '<ul class="listaNombres">';
                while ($datos = mysqli_fetch_array($rs)){
                    echo "<li class='oscuro'><a href='index.php?id=".$datos["idPaciente"]."'>".$datos["apellido"]."</a>, ".$datos["nombre"]."</li>";

                }
                echo '</ul>';
            }
        
        // o checamos si se ha enviado un id de un registro para buscar los datos de ese registro
        }else if ($_REQUEST["id"]){
            //recuperamos el id
            $idPaciente = $_REQUEST["id"];
            //hacemos una búsqueda de todos los datos del registro con el id enviado
            $sql = "select * from juanf_A_pacientes where idPaciente =".$idPaciente;
            $rs = ejecutar($sql);
            $datosPaciente = mysqli_fetch_array($rs);          

        }else{
            echo '<div id="r1">Presione una letra para buscar apellidos de pacientes que inicien con la letra seleccionada</div>';
        }
        ?>
        
    </div>
    
    <?php
    if ($_REQUEST["id"]){
    ?>
        <div class="contenedorRegistro" id="registro"> 
        
            <!-- tarjeton registro -->
            <div class="registro">
                <div class="cerrar">
                    <button type="button" onClick=""><i class="fas fa-edit"></i></button>
                    <button type="button" onClick=""><i class="fas fa-trash"></i></button>
                    <button type="button" onClick="cerrarTarjeton()"><i class="fas fa-window-close"></i></button>
                </div>

                <div class="nombre"><?php echo $datosPaciente["nombre"]." ".$datosPaciente["apellido"];?></div>
                
                <div class="icono"><i class="fas fa-envelope"></i></div>
                <div class="datos"><?php echo $datosPaciente["email"];?></div>
                <div class="foto">
                    <?php if ($registro["foto"] == null) {
                        echo "<img src='fotos/noFoto.png' class='fotoContacto'>";
                    }
                    ?>
                </div>

                <div class="icono"><i class="fas fa-venus-mars"></i></div>
                <div class="datos"><?php echo $datosPaciente["genero"];?></div>

                <div class="icono"><i class="fas fa-phone"></i></div>
                <div class="datos"><?php echo $datosPaciente["telefono"];?></div>
                
                <div class="icono"><i class="far fa-calendar-alt"></i></div>
                <div class="datos"><?php echo $datosPaciente["fechaNacimiento"];?></div>

                <div class="icono"><i class="fas fa-university"></i></div>
                <div class="datos"><?php echo $datosPaciente["escolaridad"];?></div>
                
                <div class="spacer"></div>
                
                <div class="icono"><i class="fas fa-file-alt"></i></div>
                <div class="datos2">
                    <?php echo $datosPaciente["diagnostico"];?>
                </div>

                <div class="icono"><i class="far fa-comments"></i></div>
                <div class="datos2"><?php echo $datosPaciente["comoEnteraste"];?></div>


                <div class="sinIcono"></div>
                <div class="mensaje">aqui va el mensaje </div>

                

            </div>
            
            
                <!--termina tarjeton registro -->
            

        </div>
        <script language="javascript">mostrarDatosRegistro()</script>

    <?php
    }
    ?>


</section>

<div class="modal">
    <div class="modal-bg">
        <div class="modal-container"> </div>
    </div>
</div>



</body>
</html>