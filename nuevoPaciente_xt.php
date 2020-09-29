<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
<?php
//checamos si se ha enviado el formulario
if (isset($_POST["nombre"])){
    //recuperamos los datos del formulario
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

    include "../conexion.php";

    //tenemos que checar que el paciente que vamos a ingresar no este ya registrado
    //Para ello vamos a buscar el email que queremos ingresar y ver si ya existe en el sistema.
    $sql ="select email from juanf_A_pacientes where email = '".$email."'";
    $rs = ejecutar($sql);
    if (mysqli_num_rows($rs) != 0){
        //el email ya existe en el sistema
        //redireccionamos a la página nuevoPaciente.php reenviando los datos ingresados a través de un formulario
        echo "<form id='f1' method='post' action='nuevoPaciente2.php'>";
        echo "<input type='hidden' name='error' value='registrado'>";
        echo "<input type='hidden' name='nombre' value='".$nombre."'>";
        echo "<input type='hidden' name='apellido' value='".$apellido."'>";
        echo "<input type='hidden' name='email' value='".$email."'>";
        echo "<input type='hidden' name='genero' value='".$genero."'>";
        echo "<input type='hidden' name='telefono' value='".$telefono."'>";
        echo "<input type='hidden' name='dia' value='".$dia."'>";
        echo "<input type='hidden' name='mes' value='".$mes."'>";
        echo "<input type='hidden' name='anio' value='".$anio."'>";
        echo "<input type='hidden' name='escolaridad' value='".$escolaridad."'>";
        echo "<input type='hidden' name='diagnostico' value='".$diagonostico."'>";
        echo "<input type='hidden' name='enteraste' value='".$enteraste."'>";
        
        
        echo "</form>";
        //Y javascript lo reenvía
        echo "<script language='javascript'>";
        echo "document.getElementById('f1').submit();";
        echo "</script>";



    }else{
        //hacemos un query para insertar los datos en la BD
        $sql = "insert into juanf_A_pacientes (nombre, apellido, genero, fechaNacimiento, escolaridad, email, telefono, diagnostico, comoEnteraste) values('$nombre', '$apellido', '$genero', '$fecha', '$escolaridad', '$email', '$telefono', '$diagnostico', '$enteraste')";
        $nada = ejecutar($sql);

        //mostramos al usario que los datos fueron ingresado correctaamente. Para ello, redireccionamos a index y con el id del registro
        //que acabamos de ingresar, mostramos el tarjetón
        //Para encontrar el último id ingresado, buscamos el máximo id de la tabla, con el query: select max(idPaciente) from juanf_A_pacientes

        $sql = "select idPaciente from juanf_A_pacientes where idPaciente = (select max(idPaciente) from juanf_A_pacientes)";
        $rs = ejecutar($sql);
        $dato = mysqli_fetch_array($rs);
        $ultimoIdIngresado = $dato["idPaciente"];

        //redireccionamos a index
        echo '<script language="javascript">';
        echo 'window.location.assign("index.php?id='.$ultimoIdIngresado.'&msj=ingreso");';
        echo '</script>';

    }
    
}else{
    //reenviamos a index.php
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php");';
    echo '</script>';
}
?>  
</body>
</html>