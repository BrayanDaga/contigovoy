$(document).ready(function () {
    $('.datepicker').datepicker();
    $date = $('#date');
    $hours = $('#hours');
	$doctor = $('#psicologa');
    $date.change(loadHours);
	$doctor.change(loadHours);
	loadHours();


});
const noHoursAlert = `<div class="alert alert-danger" role="alert">
    <strong>Lo sentimos!</strong> No se encontraron horas disponibles para el médico en el día seleccionado.
</div>`;


function loadHours() {
    fecha = $('#date').val();
    var numeroDia = new Date(fecha).getDay();    
	const doctorId = $doctor.val();
    const url = `/dias?date=${fecha}&doctor_id=${doctorId}`;
    $.getJSON(url, displayHours);
}

function displayHours(data) {
	if (!data.morning && !data.afternoon) {
		$hours.html(noHoursAlert);
		return;
	}

	let htmlHours = '';
	iRadio = 0;

	if (data.morning) {
		const morning_intervals = data.morning;
		morning_intervals.forEach(interval => {
			htmlHours += getRadioIntervalHtml(interval);
		});
	}
	if (data.afternoon) {
		const afternoon_intervals = data.afternoon;
		afternoon_intervals.forEach(interval => {
			htmlHours += getRadioIntervalHtml(interval);
		});
	}
	$hours.html(htmlHours);
}

function getRadioIntervalHtml(interval) {
	const text = `${interval.start} - ${interval.end}`;

	return `<div class="custom-control custom-radio mb-3">
  <input name="horacita" value="${interval.start}" class="custom-control-input" id="interval${iRadio}" type="radio" required>
  <label class="custom-control-label" for="interval${iRadio++}">${text}</label>
</div>`;
}