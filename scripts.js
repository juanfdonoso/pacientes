function mostrarResultados(letra){
    window.location.assign("index.php?letra="+letra);
}

function mostrarDatosRegistro(){
    document.getElementById("contenedor").style.display="none";
    document.getElementById("registro").style.display="flex";
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

    if (c1 =="" || c2 =="" || c3 == "" || c4== "" || c50=="" || c51=="" || c52=="" || c6=="" || c7=="" || c8=="" || c9==""){
        alert("Llene todos los campos para continuar");
    }else{
        document.getElementById("f1").submit();
    }
}

function cancelar(){
    //regresa a la página index
    window.location.assign("index.php");
}

function nuevoPaciente(){
    //enviamos a la página nuevoPaciente.php
    window.location.assign("nuevoPaciente.php");
}

function borrarValor(id){
    //borramos el valor del campo con id = id(el parámetro enviado)
    document.getElementById(id).value = "";
}

function cerrarTarjeton(){
    //redireccionar a index.php
    window.location.assign("index.php");
}

function borrarPaciente(id){
    var r = confirm("Esta seguro de borrar este registro?");
    if (r){
        window.location.assign("borrarPaciente_xt.php?id="+id);
    }
}

function editarPaciente(id){
    window.location.assign("editarPaciente.php?id="+id);
}