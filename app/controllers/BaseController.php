<?php
namespace controllers;

class BaseController
{
    public $f3;

    public function __construct()
    {
        $this->f3 = \Base::instance(); // get the instance of the fat free framework
    }
      
    public function renderTemplate()
    {
        echo \Template::instance()->render('views/template.php'); // render the template
    }
}