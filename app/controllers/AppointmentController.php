<?php

namespace controllers;

use models\User;
use Carbon\Carbon;
use models\Appointment;
use models\DoctorAppointments;
use controllers\BaseController;

class AppointmentController extends BaseController
{

   public function __construct()
   {
      parent::__construct();
   }

   public function list(): void
   {
      if ( $this->f3->get('SESSION.user') ) {
         $instance = new DoctorAppointments($this->f3->DB);
         $appointments['data'] = $instance->find(['doctor_id=?',  $this->f3->get('SESSION.user.id')]); 
         echo json_encode($appointments);
      }
   }

   public function miscitas(): void
   {
      if ( $this->f3->get('SESSION.user') ) {
         $this->f3->set('title', '| Mis citas');
         $this->f3->set('scripts', 'appointment.php');
         $this->f3->set('content', 'miscitas.htm');
         $this->renderTemplate();
      }
   }
}
