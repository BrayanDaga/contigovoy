<?php 
require_once __DIR__ .'/vendor/autoload.php';
use Dotenv\Dotenv;
use App\Controllers\ViewController;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require_once __DIR__ ."/core/config.php";
$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();