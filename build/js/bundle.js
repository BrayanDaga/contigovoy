function nextTab(a){$(a).next().find('a[data-toggle="tab"]').click()}function prevTab(a){$(a).prev().find('a[data-toggle="tab"]').click()}function valIni(){var a=$("#psicologa option:selected").val();$("#selectPsicologo").val(a);var e=$("#especialidad option:selected").val();$("#terapia").val(e)}function calculateAge(a){var e=new Date,t=new Date(a),o=e.getFullYear()-t.getFullYear(),i=e.getMonth()-t.getMonth();return(i<0||0===i&&e.getDate()<t.getDate())&&o--,o}$(document).ready((function(){var a=$("#fechacita").val();const e=["lunes","martes","miércoles","jueves","viernes","sábado","domingo"];""==a&&$(".horario").prop("disabled",!0),$("#fechacita").change((function(){a=$("#fechacita").val(),console.log(a);var t=new Date(a).getDay();const o=e[t];console.log("Nombre de día de la semana: ",o),"domingo"==o?($(".horario").prop("disabled",!0),alert("No hay citas los domingo")):"sábado"==o?($(".horario").prop("disabled",!1),$(".l-v").hide(),$(".sábado").show()):($(".horario").prop("disabled",!1),$(".sábado").hide(),$(".l-v").show())}))})),$(document).ready((function(){$("#fechaNac").prop("max",(function(){return(new Date).toJSON().split("T")[0]})),$("#fechacita").prop("min",(function(){return(new Date).toJSON().split("T")[0]})),$(".nav-tabs > li a[title]").tooltip(),$('a[data-toggle="tab"]').on("shown.bs.tab",(function(a){if($(a.target).parent().hasClass("disabled"))return!1})),$(".next-step").click((function(a){var e=$(".wizard .nav-tabs li.active");e.next().removeClass("disabled"),nextTab(e)})),$(".prev-step").click((function(a){prevTab($(".wizard .nav-tabs li.active"))})),valIni()})),$(".nav-tabs").on("click","li",(function(){$(".nav-tabs li.active").removeClass("active"),$(this).addClass("active")})),$("#psicologa").change((function(){var a=$("#psicologa option:selected").val();$("#selectPsicologo").val(a)})),$("#especialidad").change((function(){var a=$("#especialidad option:selected").val();$("#terapia").val(a)})),$("#fechaNac").change((function(){var a=calculateAge($("#fechaNac").val());$("#edad").val(a)}));
//# sourceMappingURL=bundle.js.map
