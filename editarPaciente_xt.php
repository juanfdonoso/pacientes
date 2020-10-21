<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// checamos si se ha enviado el formulario con el id del paciente que se va a editar
if (isset($_POST["idPaciente"])){
    //rescatamos todos los datos enviados 
    $idPaciente = $_POST["idPaciente"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $genero = $_POST["genero"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $anio = $_POST["anio"];
    $escolaridad = $_POST["escolaridad"];
    $diagnostico = $_POST["diagnostico"];
    $enteraste = $_POST["enteraste"];
    $pw = $_POST["pw"];

    //hay que configurar la fecha en la forma yyyy-mm-dd para ingresarlo a la BD
    $fecha="";

    if ($dia < 10){
        $fecha = $fecha.$anio."-".$mes."-0".$dia;

    }else{
        $fecha = $fecha.$anio."-".$mes."-".$dia;
    }

    include "../conexion.php";

    //elaboramos un query para hacer un update de la información del paciente
    $sql = "update juanf_A_pacientes set nombre = '$nombre', apellido = '$apellido', genero = '$genero', email = '$email', 
    telefono = '$telefono', fechaNacimiento = '$fecha', escolaridad = '$escolaridad', diagnostico = '$diagnostico', 
    comoEnteraste = '$enteraste', pw = '$pw' where idPaciente = ".$idPaciente;

    $nada = ejecutar($sql);

    //redireccionamos a index con query string que muestre los datos editados y un mensaje que indique que se hizo la edición
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php?id='.$idPaciente.'&msj=editar");';
    echo '</script>';





}else{
    //reenviamos a index.php
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php");';
    echo '</script>';

}

?>    
</body>
</html>