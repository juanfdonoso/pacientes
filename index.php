<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Directorio</title>
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
        <button type="button"><i class="fas fa-caret-square-left"></i></button>
        <div class="registro"></div>
        <button type="button"><i class="fas fa-caret-square-right"></i></button>
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