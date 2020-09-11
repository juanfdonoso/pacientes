function mostrarResultados(letra){
    window.location.assign("index.php?letra="+letra);
}

function mostrarDatosRegistro(){
    document.getElementById("contenedor").style.display="none";
    document.getElementById("registro").style.display = "flex";
}