<?php

namespace controllers;

use controllers\BaseController;


class PageController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
        
    public function home(): void
    {
        $this->f3->set('title', '');
        $this->f3->set('content', 'home.htm');
        $this->renderTemplate();
    }

    public function conocenos(): void
    {
        $this->f3->set('title', '| Conocenos');
        $this->f3->set('content', 'conocenos.htm');
        $this->renderTemplate();
    }

   
    public function material(): void
    {
        $this->f3->set('title', '| Material');
        $this->f3->set('content', 'material.htm');
        $this->renderTemplate();
    }
    public function servicios(): void
    {
        $this->f3->set('title', '| Servicios');
        $this->f3->set('content', 'servicios.htm');
        $this->renderTemplate();
    }

}
