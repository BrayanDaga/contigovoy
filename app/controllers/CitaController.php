<?php 
namespace controllers;

use models\Blog;
use models\User;
use Carbon\Carbon;
use models\Appointment;
use controllers\EmailController;

class CitaController extends EmailController {
   
    public function __construct()
    {
        parent::__construct();

    } 

    public function get(): void
    {
        $instance = new User($this->f3->DB);
         $instance->reset();
         $doctors = $instance->find(['role=?','doctor']);    
        $this->f3->set('title', '| Reserva tu Cita');
        $this->f3->set('content', 'reservatucita.php');
        $this->f3->set('scripts', 'horarios.php');
        $this->f3->set('doctors', $doctors);
        $this->renderTemplate();
        $this->f3->clear('SESSION.message');
    }

    
    public function post(){
        if ($this->f3->get('SESSION.user')) {
			if (
                $_POST['nombres'] == "" &&
                $_POST['paterno'] == "" &&
                $_POST['materno'] == "" &&
                $_POST['correo'] == "" &&
                $_POST['celular'] == "" &&
                $_POST['psicologa'] == "" &&
                $_POST['fechacita'] == "" &&
                $_POST['horacita'] == "" &&
                $_POST['edad'] == "" &&
                $_POST['especialidad'] == "" &&
                $_POST['consulta'] == "" &&
                $_POST['tipdoc'] == "" &&
                $_POST['nrodoc'] == "" &&
                $_POST['tutor'] == "" 
            
            ) {
				$this->f3->set('message', 'Debe rellenar todos los datos');
			}  else {
                // var_dump($_POST);
                $carbonTime = Carbon::createFromFormat('g:i A', $_POST['horacita']);
                 $appointment = new Appointment($this->f3->DB);
				 $appointment->doctor_id = $_POST['psicologa'];
				 $appointment->patient_id = $this->f3->get('SESSION.user.id');
				 $appointment->day = $_POST['fechacita'];
				 //$appointment->hour = $_POST['horacita'];
				 $appointment->hour =  $carbonTime->format('H:i:s');
              

				 $appointment->save();

                 $this->sendEmail();
			}
		} else {
			$this->f3->reroute('/login', false);
		}
		$this->get();


    }


}