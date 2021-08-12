<div class="mibgheader">
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <h2 class="h1 m-2 p-5  text-center text-danger font-weight-bold">Reserva tu Cita</h2>
        </div>

    </div>
</div>


<section class="signup-step-container">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Terapia / Tipo de consulta</i></a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Fecha y hora de la cita</i></a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i>Médico y datos del paciente</i></a>
                            </li>
                      
                        </ul>
                    </div>

                    <form role="form" action="/reservacita" class="login-box" method="POST">
                        <div class="tab-content" id="main_form">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h4 class="text-center">Selecciona el tipo de consulta</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecciona una especialidad</label>
                                            <select class="form-control" id="especialidad" name="especialidad">
                                                <option value="Sesión de psicoterapia individual">Sesión de psicoterapia individual</option>
                                                <option value="Sesión de terapia de pareja">Sesión de terapia de pareja</option>
                                                <option value="Sesión de terapia familiar">Sesión de terapia familiar</option>
                                                <option value="Psicopedagógica evaluación integral">Psicopedagógica evaluación integral</option>
                                                <option value="Terapia de lenguaje">Terapia de lenguaje</option>
                                                <option value="Terapia de Aprendizaje">Terapia de Aprendizaje</option>
                                                <option value="Psicoterapia">Psicoterapia.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Selecciona el tipo de consulta</label>
                                            <select class="form-control" name="consulta" id="consulta">
                                                <option value="Primera consulta">Primera consulta</option>
                                                <option value="Consulta de seguimiento">Consulta de seguimiento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Si no tuviera ninguno asignado selecciona Cualquier médico</label>
                                            <select class="form-control" name="psicologa" id="psicologa">
                                                <option value="Ana Vizcarra Sajami">Ana Vizcarra Sajami</option>
                                                <option value="Wendy Aylas Martínez">Wendy Aylas Martínez</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="default-btn next-step" id="btn1">Siguiente</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h4 class="text-center">Fecha y hora de la cita</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Seleccione la fecha</label>
                                            <input  required type="date" name="fechacita" id="fechacita" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="p-2 mr-2 bg-success"> Presencial</label>
                                            <label class="p-2 mr-2 bg-danger"> Virtual</label>
                                        </div>

                                        <div class="form-group">
                                        <label class="radio-inline mr-2 p-2 bg-success" >
                                            <input  required type="radio" name="horacita" id="horacita" value="14:00" /> 14:00
                                        </label>

                                        <label class="radio-inline mr-2 p-2 bg-success" >
                                            <input  required type="radio" name="horacita" id="horacita" value="15:00" /> 15:00
                                        </label>
                                        <label class="radio-inline mr-2 p-2" style="background-color: orangered;">
                                            <input  required type="radio" name="horacita" id="horacita" value="19:00" /> 19:00
                                        </label>
                                        <label class="radio-inline mr-2 p-2 bg-danger" >
                                            <input  required type="radio" name="horacita" id="horacita" value="20:00" /> 20:00
                                        </label>
                                        <label class="radio-inline mr-2 p-2 bg-danger" >
                                            <input  required type="radio" name="horacita" id="horacita" value="21:00" /> 21:00
                                        </label>
                                        </div>
                                       
                                    </div>
                                   
                                </div>


                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="default-btn prev-step">Atras</button></li>
                                    <li><button type="button" class="default-btn next-step">Siguiente</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h4 class="text-center">Médico y datos del paciente</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Psicologo</label>
                                            <input  required class="form-control" type="text"  id="selectPsicologo"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de terapia</label>
                                            <input class="form-control" type="text" name="terapia" id="terapia" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo de documento</label>
                                            <input  required class="form-control" type="text" name="tipdoc" id="tipdoc" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>N° de documento</label>
                                            <input  required class="form-control" type="text" name="nrodoc" name="nrodoc"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellido paterno</label>
                                            <input  required class="form-control" type="text" name="paterno" id="paterno" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apellido materno</label>
                                            <input  required class="form-control" type="text" name="materno" id="materno" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombres</label>
                                            <input  required class="form-control" type="text" name="nombres" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Correo Electroncio</label>
                                            <input  required class="form-control" type="email" name="correo" id="correo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Celular</label>
                                            <input  required class="form-control" type="text" name="celular" id="celular" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tutor(Menor de edad)</label>
                                            <input  required class="form-control" type="text" name="tutor" id="tutor" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input  required class="form-control" type="date" name="fechaNac" id="fechaNac" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input  required class="form-control" type="number" name="edad" id="edad" readonly>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="default-btn prev-step">Atras</button></li>
                                    <input type="text" name="action"  value="enviarEmail" style="display: none;">
                                    <li><button type="submmit" class="default-btn next-step">Finalizar</button></li>
                                </ul>
                            </div>
                          
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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

    // $('#btn1').click(function() { 
    //     var psicoSelected = $('#psicologa option:selected');
	// 	var psicoValue = psicoSelected.val();
    //     $('#selectPsicologo').val(psicoValue);
    //     var consultaSelected = $('#consulta option:selected');
	// 	var consultaValue = consultaSelected.val();
    //     $('#terapia').val(consultaValue);

    // });

    function valIni(){
        var psicoSelected = $('#psicologa option:selected');
		var psicoValue = psicoSelected.val();
        $('#selectPsicologo').val(psicoValue);
        var especialidadSelected = $('#especialidad option:selected');
		var especialidadValue = especialidadSelected.val();
        console.log(especialidadValue);
        $('#terapia').val(especialidadValue);
    }
    valIni();
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
</script>