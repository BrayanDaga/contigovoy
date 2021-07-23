<?php 
require_once __DIR__ .'/vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require_once __DIR__ ."/core/config.php";
// use App\Controllers\ViewController;
require_once ROOT."controllers/ViewController.php";
$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();