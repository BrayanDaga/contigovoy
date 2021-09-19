<?php

namespace controllers;

use models\Appointment;
use models\AppointmentsUsers;
use controllers\BaseController;

class AppointmentController extends BaseController
{

   public function __construct()
   {
      parent::__construct();
   }

   public function list(): void
   {
      $instance = new AppointmentsUsers($this->f3->DB);
      if ($this->f3->get('SESSION.user.role') == 'admin') {
         $appointments['data'] = $instance->find();
       } elseif($this->f3->get('SESSION.user.role') == 'doctor') {
         $appointments['data'] = $instance->find(['doctor_id=?',  $this->f3->get('SESSION.user.id')]);
       }else{
         $appointments['data'] = $instance->find(['patient_id=?',  $this->f3->get('SESSION.user.id')]);
       }
   
      echo json_encode($appointments);
   }

   public function accept(): void
   {
      if ($this->f3->get('SESSION.user.role') == 'admin'  || $this->f3->get('SESSION.user.role') == 'doctor') {
         $appointment = new Appointment($this->f3->DB);
         $appointment->load(['id=?',  $this->f3->get('PARAMS.id')]);
         $appointment->status = 'aceptado';
         $appointment->update();
         echo json_encode($appointment);
      }
   }

   public function deny(): void
   {
      if ($this->f3->get('SESSION.user.role') == 'admin'  || $this->f3->get('SESSION.user.role') == 'doctor') {
         $appointment = new Appointment($this->f3->DB);
         $appointment->load(['id=?',  $this->f3->get('PARAMS.id')]);
         $appointment->erase();
      }
   }

   public function miscitas(): void
   {
      if ($this->f3->get('SESSION.user')) {
         $this->f3->set('title', '| Mis citas');
         $this->f3->set('scripts', 'appointment.php');
         $this->f3->set('content', 'miscitas.htm');
         $this->renderTemplate();
      }
   }
}
