<?php 

use App\Controllers\ViewController;


require_once "core/config.php";
require_once 'vendor/autoload.php';

$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();

