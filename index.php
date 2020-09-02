<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacientes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://kit.fontawesome.com/5637dd924f.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
<h1>Pacientes</h1>
<button type="button">Nuevo Paciente</button>
</div>

<section class="botonera">
    <?php
        echo "<button type='button'>A</button>";
        echo "<button type='button'>B</button>";
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
        <div id="r1">Registros encontrados: </div>
        
        <ul class="listaNombres">
            <li class="oscuro">Donoso, Juan</li>
            <li class="claro">Donoso, Jose</li>
            <li class="oscuro">Donoso, Juan Fernando</li>
        </ul>
    </div>
    

    <div class="contenedorRegistro" id="registro"> 
    
        <!-- tarjeton registro -->
        <div class="registro">
            <div class="cerrar">
                <button type="button" onClick=""><i class="fas fa-edit"></i></button>
                <button type="button" onClick=""><i class="fas fa-trash"></i></button>
                <button type="button" onClick="cerrarTarjeton()"><i class="fas fa-window-close"></i></button>
            </div>

            <div class="nombre">Juan Donoso </div>
            
            <div class="icono"><i class="fas fa-envelope"></i></div>
            <div class="datos">juan.donoso@ibero.mx </div>
            <div class="foto">
                <?php if ($registro["foto"] == null) {
                    echo "<img src='fotos/noFoto.png' class='fotoContacto'>";
                }
                ?>
            </div>

            <div class="icono"><i class="fas fa-venus-mars"></i></div>
            <div class="datos">M </div>

            <div class="icono"><i class="fas fa-phone"></i></div>
            <div class="datos">556699887744 </div>
            
            <div class="icono"><i class="far fa-calendar-alt"></i></div>
            <div class="datos">1980-05-20</div>

            <div class="icono"><i class="fas fa-university"></i></div>
            <div class="datos">escolaridad  </div>
            
            <div class="spacer"></div>
            
            <div class="icono"><i class="fas fa-file-alt"></i></div>
            <div class="datos2">
                aqui va el diagnostico <br> El diagnóstico puede tener varias líneas<br> 
                Este es un ejemplo de diagnóstico relativamente largo<br><br>
                Se recomienda que el paciente use una silla conformada
            </div>

            <div class="icono"><i class="far fa-comments"></i></div>
            <div class="datos2">como te enteraste  </div>


            <div class="sinIcono"></div>
            <div class="mensaje">aqui va el mensaje </div>

            

        </div>
        
        
            <!--termina tarjeton registro -->
        

     </div>


</section>

<div class="modal">
    <div class="modal-bg">
        <div class="modal-container"> </div>
    </div>
</div>


<script src="./scripts.js"></script>  
</body>
</html>