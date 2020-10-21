<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//checamos si se ha enviado un id del paciente que hay que borrar
if (isset($_REQUEST["id"])){
    //recuperamos el id y borramos el paciente
    $idPaciente = $_REQUEST["id"];
    include "../conexion.php";

    //elaboramos el query de borrado
    $sql = "delete from juanf_A_pacientes where idPaciente=".$idPaciente;
    $nada = ejecutar($sql);

    //redireccionamos a index.php con un querystring que indique que se eliminó el paciente de la BD
    echo "<script language='javascript'>";
    echo "window.location.assign('index.php?borrar=yes');";
    echo "</script>";

}else{
    //redireccionamos a index.php
    echo "<script language='javascript'>";
    echo "window.location.assign('index.php');";
    echo "</script>";
}


?>
</body>
</html>