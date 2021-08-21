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

$timeCache = 10800; // 3 hours

$f3->route('GET /','controllers\ViewController->home',$timeCache); 
$f3->route('GET /servicios','controllers\ViewController->servicios',$timeCache); 
$f3->route('GET /conocenos','controllers\ViewController->conocenos',$timeCache); 
$f3->route('GET /reservacita','controllers\ViewController->reservacita',$timeCache); 
$f3->route('GET /blog','controllers\ViewController->blog',$timeCache); 
$f3->route('GET /material','controllers\ViewController->material',$timeCache); 

$f3->route('POST /reservacita','controllers\EmailController->usarPhpMailer');



$f3->set('ONERROR',function($f3){
    $f3->set('content','404.html');
    echo \Template::instance()->render('views/template.php');
  });

$f3->run();
