$(document).ready((function(){var o=$("#fechacita").val();const a=["lunes","martes","miércoles","jueves","viernes","sábado","domingo"];""==o&&$(".horario").prop("disabled",!0),$("#fechacita").change((function(){o=$("#fechacita").val(),console.log(o);var e=new Date(o).getDay();const d=a[e];console.log("Nombre de día de la semana: ",d),"domingo"==d?($(".horario").prop("disabled",!0),alert("No hay citas los domingo")):"sábado"==d?($(".horario").prop("disabled",!1),$(".l-v").hide(),$(".sábado").show()):($(".horario").prop("disabled",!1),$(".sábado").hide(),$(".l-v").show())}))}));
//# sourceMappingURL=bundle.js.map
