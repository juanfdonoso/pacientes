<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
<?php
//checamos si se ha enviado el idPaciente, del paciente a editar
if (isset($_POST["idPaciente"])){
    //incluimos la conexion
    include "../conexion.php";
    
    //recuperamos los datos enviados
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

    //hay que configurar la fecha en la forma yyyy-mm-dd para ingresarlo a la BD
    $fecha="";

    if ($dia < 10){
        $fecha = $fecha.$anio."-".$mes."-0".$dia;

    }else{
        $fecha = $fecha.$anio."-".$mes."-".$dia;
    }

    //hacemos el query de update
    $sql = "update juanf_A_pacientes set nombre = '$nombre', apellido = '$apellido', genero = '$genero', 
    email = '$email', telefono = '$telefono', fechaNacimiento = '$fecha', escolaridad = '$escolaridad', 
    diagnostico = '$diagnostico', comoEnteraste ='$enteraste' where idPaciente = ".$idPaciente;

    $nada = ejecutar($sql);

    //redireccionamos la página a index.php con un querystring que muestre el tarjetón y que despliegue un 
    //mensaje que los datos del paciente se editaron correctamente.
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php?id='.$idPaciente.'&msj=edicion");';
    echo '</script>';
    

}else{
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php");';
    echo '</script>';
}

?>
    
</body>
</html>