    // ------------step-wizard-------------
    $(document).ready(function() {
        $('#fechaNac').prop('max', function(){
            return new Date().toJSON().split('T')[0];
        });
        $('#fechacita').prop('min', function(){
            return new Date().toJSON().split('T')[0] ;
        });
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {

            var target = $(e.target);

            if (target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var active = $('.wizard .nav-tabs li.active');
            active.next().removeClass('disabled');
            nextTab(active);

        });
        $(".prev-step").click(function(e) {

            var active = $('.wizard .nav-tabs li.active');
            prevTab(active);

        });

        valIni();

    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    $('.nav-tabs').on('click', 'li', function() {
        $('.nav-tabs li.active').removeClass('active');
        $(this).addClass('active');
    });

    function valIni(){
        var psicoSelected = $('#psicologa option:selected');
		var psicoValue = psicoSelected.val();
        $('#selectPsicologo').val(psicoValue);
        var especialidadSelected = $('#especialidad option:selected');
		var especialidadValue = especialidadSelected.val();
        // console.log(especialidadValue);
        // $('#terapia').val(especialidadValue);
    }
    $('#psicologa').change(function () { 
        var psicoSelected = $('#psicologa option:selected');
		var psicoValue = psicoSelected.val();
        $('#selectPsicologo').val(psicoValue);
    });
    $('#especialidad').change(function () { 
        var especialidadSelected = $('#especialidad option:selected');
		var especialidadValue = especialidadSelected.val();
        $('#terapia').val(especialidadValue);
    });
    $('#fechaNac').change(function () { 
        var fechaNac = $('#fechaNac').val();
        var age = calculateAge(fechaNac)
        $('#edad').val(age);
    });

    //function calculate age from birt date
    function calculateAge(dob) {
        var today = new Date();
        var birthDate = new Date(dob);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

   
