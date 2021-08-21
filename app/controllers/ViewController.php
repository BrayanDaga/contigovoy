<?php

namespace Controllers;

class ViewController
{
    public $f3;

    public function __construct(\Base $f3)
    {
        $this->f3 = $f3;
    }
        
    public function renderTemplate()
    {
        echo \Template::instance()->render('views/template.php');
    }

    public function home(): void
    {
        $this->f3->set('title', 'Home');
        $this->f3->set('content', 'home.htm');
        $this->renderTemplate();
    }

    public function conocenos(): void
    {
        $this->f3->set('title', 'Conocenos');
        $this->f3->set('content', 'conocenos.htm');
        $this->renderTemplate();
    }
    public function reservacita(): void
    {
        $this->f3->set('title', 'Reserva tu Cita');
        $this->f3->set('content', 'reservatucita.php');
        $this->f3->set('message', $_SESSION['message']);
        $this->renderTemplate();
        unset($_SESSION['message']);
    }
    public function blog(): void
    {
        $this->f3->set('title', 'Blog');
        $this->f3->set('content', 'blog.htm');
        $this->renderTemplate();
    }
    public function material(): void
    {
        $this->f3->set('title', 'Material');
        $this->f3->set('content', 'material.htm');
        $this->renderTemplate();
    }
    public function servicios(): void
    {
        $this->f3->set('title', 'Servicios');
        $this->f3->set('content', 'servicios.htm');
        $this->renderTemplate();
    }

}
