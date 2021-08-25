$(document).ready(function(){
    var fecha = $('#fechacita').val();//string
    const dias = [
            'lunes',
            'martes',
            'miércoles',
            'jueves',
            'viernes',
            'sábado',
            'domingo',                   
            ];

    if(fecha==""){
        $('.horario').prop('disabled',true)
    }

    $('#fechacita').change(function(){        
        fecha = $('#fechacita').val();
        // console.log(fecha);
        var numeroDia = new Date(fecha).getDay()
        const nombreDia = dias[numeroDia];
        // console.log("Nombre de día de la semana: ", nombreDia);
        if(nombreDia == "domingo"){
            $('.horario').prop('disabled',true)
            alert("No hay citas los domingo")
        }
        else if(nombreDia == "sábado"){
            $('.horario').prop('disabled',false)
            $('.l-v').hide()
            $('.sábado').show()

        }
        else{
            $('.horario').prop('disabled',false)
            $('.sábado').hide()
            $('.l-v').show()
        }
        
    })  
})
