<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$f3 = \Base::instance();
$f3->set('AUTOLOAD', './app/');
$f3->CACHE = true;

$db=new DB\SQL(
    'mysql:host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';dbname='.$_ENV['DB_DATABASE'].';charset=utf8',
    $_ENV['DB_USERNAME'],
    $_ENV['DB_PASSWORD'],
    [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_STRINGIFY_FETCHES => false,
    ]
);

$f3->set('DB', $db);

$timeCache = 120; // 2 minutes	

$f3->route('GET /', 'controllers\PageController->home');
$f3->route('GET /servicios', 'controllers\PageController->servicios');
$f3->route('GET /conocenos', 'controllers\PageController->conocenos');
$f3->route('GET /material', 'controllers\PageController->material');

$f3->map('/reservacita', 'controllers\CitaController');

$f3->route('GET /login', 'controllers\AuthController->login');
$f3->route('POST /login', 'controllers\AuthController->auth');
$f3->route('POST /logout','controllers\AuthController->logout');

$f3->route('GET /blog/@slug', 'controllers\BlogController->show');
$f3->route('GET /blog', 'controllers\BlogController->index');
$f3->route('GET /blog/create', 'controllers\BlogController->create');
$f3->route('POST /blog/create', 'controllers\BlogController->store');



$f3->redirect('GET|HEAD /admin', '/login');


$f3->set('ONERROR', function ($f3) {
	$f3->set('content', '404.html');
	echo \Template::instance()->render('views/template.php');
});


$f3->run();
