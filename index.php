<?php
session_start();
require 'vendor/autoload.php';
use Dotenv\Dotenv; 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$f3 = \Base::instance();
$f3->set('AUTOLOAD','app/');
$f3->set('CACHE',TRUE);


$f3->set('menu',
	array_merge(
        array(
			'Home'=> $f3->get('BASE') == '' ? '/' : $f3->get('BASE'), 
		),
			array(
				// About doesn't appear when we're logged in
				'Servicios'=>'servicios',
				'Conocenos'=>'conocenos',
				'Servicios'=>'servicios',
				'Reserva tu Cita'=>'reservacita',
				'Blog'=>'blog',
				'Material'=>'material',
			)
	)
);

$f3->route('GET /',
    function($f3) {
        $f3->set('title','Home');
        $f3->set('content','home.htm');
        echo \Template::instance()->render('views/template.php');

    }
);

$f3->route('GET /servicios',
    function($f3) {
        $f3->set('title','Servicios');
        $f3->set('content','servicios.htm');
        echo \Template::instance()->render('views/template.php');
    }
);


$f3->route('GET /conocenos',
    function($f3) {
        $f3->set('title','Conocenos');
        $f3->set('content','conocenos.htm');
        echo \Template::instance()->render('views/template.php');
    }
);

$f3->route('GET /reservacita',
    function($f3) {
        $f3->set('title','Reserva tu Cita');
        $f3->set('content','reservatucita.php');
        $f3->set('message', $_SESSION['message']  );
        echo \Template::instance()->render('views/template.php');
        unset($_SESSION['message']);

    }
);

$f3->route('POST /reservacita','controllers\EmailController->usarPhpMailer');

$f3->route('GET /blog',
    function($f3) {
        $f3->set('title','Blog');
        $f3->set('content','blog.htm');
        echo \Template::instance()->render('views/template.php');
    }
);

$f3->route('GET /material',
    function($f3) {
        $f3->set('title','Material');
        $f3->set('content','material.htm');
        echo \Template::instance()->render('views/template.php');
    }
);

$f3->set('ONERROR',function($f3){
    $f3->set('content','404.html');
    echo \Template::instance()->render('views/template.php');
  });

$f3->run();
