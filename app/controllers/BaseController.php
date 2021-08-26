<?php
namespace controllers;

class BaseController
{
    public $f3;

    public function __construct()
    {
        $this->f3 = \Base::instance();
    }
      
    public function renderTemplate()
    {
        echo \Template::instance()->render('views/template.php');
    }
}