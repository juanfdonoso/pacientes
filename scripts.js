function mostrarResultados(letra){
    window.location.assign("index.php?letra="+letra);
}

function mostrarDatosRegistro(){
    document.getElementById("contenedor").style.display="none";
    document.getElementById("registro").style.display = "flex";
}

function validarFormularioPaciente(){
    var c1 = document.getElementById("c1").value;
    var c2 = document.getElementById("c2").value;
    var c3 = document.getElementById("c3").value;
    var c4 = document.getElementById("c4").value;
    var c50 = document.getElementById("c50").value;
    var c51 = document.getElementById("c51").value;
    var c52 = document.getElementById("c52").value;
    var c6 = document.getElementById("c6").value;
    var c7 = document.getElementById("c7").value;
    var c8 = document.getElementById("c8").value;
    var c9 = document.getElementById("c9").value;
    var p1 = document.getElementById("p1").value;
    var p2 = document.getElementById("p2").value;

    if (c1=="" || c2=="" || c3=="" || c4=="" || c50=="" || c51=="" || c52=="" || c6=="" || c7=="" || c8=="" || c9=="" || p1=="" || p2==""){
        alert("Llene todos los campos para continuar");

    }else if (p1 != p2){
        alert("Los passwords ingresados no coinciden");

    }else{
        document.getElementById("f1").submit();
    }

}

function cancelar(){
    //envía a la página index
    window.location.assign("index.php");
}

function nuevoPaciente(){
    //envía la página nuevoPaciente.php
    window.location.assign("nuevoPaciente.php");
}

function borrarContenido(id){
    //borramos el contenido de un campo con id indicado por el parámetro id
    document.getElementById(id).value = "";
}

function cerrarTarjeton(){
    //redireccionamos a index.php
    window.location.assign("index.php");
}

function borrarPaciente(id){
    var r = confirm("Esta seguro que desea eliminar este paciente?");
    if (r){
        //redireccionamos a la página borrarPaciente_xt.php
        window.location.assign("borrarPaciente_xt.php?id="+id);
    }
}

function editarPaciente(id){
    window.location.assign("editarPaciente.php?id="+id);
}


var flagPW = true;
function mostrarOcultarPW(id){
    if (flagPW){
        //mostramos el password
        document.getElementById(id).type = "input";
        document.getElementById("b"+id).innerHTML = '<i class="fas fa-eye-slash"></i>';
        flagPW = false;
    }else{
        //ocultamos el password
        document.getElementById(id).type = "password";
        document.getElementById("b"+id).innerHTML = '<i class="fas fa-eye"></i>';
        flagPW = true;
    }


}