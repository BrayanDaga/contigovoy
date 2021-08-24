$(document).ready(function(){

    validarCampoVacio() 
})
function validarCampoVacio(){
    var  fecha= $("#fechacita").val();
    console.log(fecha);
}

function tiempoTranscurrido(){
    var inicio = new Date(2021,8,22);
    var fin = new Date(2021,8,24);
    var transcurso = fin.getTime() - inicio.getTime();
    console.log(transcurso/(1000*60*60*24));
}