<?php 
namespace controllers;

use controllers\EmailController;


class CitaController extends EmailController{
   
    public function __construct()
    {
        parent::__construct();

    } 

    public function get(): void
    {
        $this->f3->set('title', '| Reserva tu Cita');
        $this->f3->set('content', 'reservatucita.php');
        $this->renderTemplate();
        $this->f3->clear('SESSION.message');
    }

    
    public function post(){
        $this->sendEmail();
    }


}