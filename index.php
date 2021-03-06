<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$f3 = \Base::instance();
$f3->set('AUTOLOAD', './app/');  //hacer autoload de las clases
$f3->CACHE = true;

$f3->UPLOADS = 'uploads/'; //ubicacion donde se subiran los archivos subidos

//Conexion a la base de datos , establesca los valores en el ENV
$db=new DB\SQL(
    'mysql:host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';dbname='.$_ENV['DB_DATABASE'].';charset=utf8',
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    [
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_STRINGIFY_FETCHES => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]
);

//Crea un usario para el login
/*
El password debe ser encriptado, puedes obtener uno de ejemplo aqui 
 -Realizado en la consola :  php -a 
echo password_hash('password',PASSWORD_DEFAULT); //input 
 $2y$10$rxkNGylxYPQSShqCYCRA..Yr27Xm9DPtT3fkosvwhM.1Z3Oneyk3q  // output
 y agregalo por el phpmyadmin o otro gestor de base de datos
  */

$f3->set('DB', $db); //asignar la conexion a la base de datos

$timeCache = 120; // 2 minutes	de cache    

/****************************  RUTAS  **********************************************/
$f3->route('GET /', 'controllers\PageController->home');
$f3->route('GET /servicios', 'controllers\PageController->servicios');
$f3->route('GET /conocenos', 'controllers\PageController->conocenos');
$f3->route('GET /material', 'controllers\PageController->material');

$f3->map('/reservacita', 'controllers\CitaController');

$f3->route('GET /login', 'controllers\AuthController->login');
$f3->route('GET /register', 'controllers\AuthController->register');
$f3->route('POST /register', 'controllers\AuthController->createUser');
$f3->route('POST /login', 'controllers\AuthController->auth');
$f3->route('POST /logout','controllers\AuthController->logout');
$f3->route('GET /changepass','controllers\AuthController->changePassword');
$f3->route('POST /changepass','controllers\AuthController->changePasswordAction');

$f3->route('GET /blog/@slug', 'controllers\BlogController->show');
$f3->route('GET /blog', 'controllers\BlogController->index');
$f3->route('GET /blog/create', 'controllers\BlogController->create');
$f3->route('POST /blog/create', 'controllers\BlogController->store');
$f3->route('GET /blog/@slug/edit', 'controllers\BlogController->edit');
$f3->route('POST /blog/@slug/edit', 'controllers\BlogController->update');
$f3->route('POST /blog/@slug/delete', 'controllers\BlogController->destroy');
/******************************* fin rutas *****************************************************/
$f3->route('GET /dias', 'controllers\HorarioController->buscarDias');
$f3->route('GET /citaslist', 'controllers\AppointmentController->list');
$f3->route('GET /miscitas', 'controllers\AppointmentController->miscitas');
$f3->route('PUT /acceptappointment/@id', 'controllers\AppointmentController->accept');
$f3->route('DELETE /denyappointment/@id', 'controllers\AppointmentController->deny');

$f3->redirect('GET|HEAD /admin', '/login');

$f3->set('ONERROR', function ($f3) {
	$f3->set('content', '404.html');
	echo \Template::instance()->render('views/template.php');
});

$f3->run();
