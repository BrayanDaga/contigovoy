<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$f3 = \Base::instance();
$f3->set('AUTOLOAD', 'app/');
$f3->CACHE = true;

$f3->set(
	'menu',
	array_merge(
		array(
			'Home' => $f3->get('BASE') == '' ? '/' : $f3->get('BASE'),
		),
		array(
			'Servicios' => 'servicios',
			'Conocenos' => 'conocenos',
			'Servicios' => 'servicios',
			'Reserva tu Cita' => 'reservacita',
			'Blog' => 'blog',
			'Material' => 'material',
		),
		$f3->get('SESSION.user') ?
			array(
				'Logout' => 'logout'
			) :
			array(
				// About doesn't appear when we're logged in
				'About' => 'about',
				'Login' => 'login'
			)
	)
);

$timeCache = 120; // 2 minutes	

$f3->route('GET /', 'controllers\PageController->home');
$f3->route('GET /servicios', 'controllers\PageController->servicios');
$f3->route('GET /conocenos', 'controllers\PageController->conocenos');
$f3->route('GET /blog', 'controllers\PageController->blog');
$f3->route('GET /material', 'controllers\PageController->material');

$f3->map('/reservacita', 'controllers\CitaController');

// $f3->route('GET /login', 'controllers\AuthController->login');
// $f3->route('POST /login', 'controllers\AuthController->auth');
// $f3->route('GET /logout','controllers\AuthController->logout');

// $f3->redirect('GET|HEAD /admin', '/login');


$f3->set('ONERROR', function ($f3) {
	$f3->set('content', '404.html');
	echo \Template::instance()->render('views/template.php');
});


$f3->run();
