<?php 
session_start();
require_once __DIR__ .'/vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


require_once __DIR__ ."/core/config.php";


// use App\Controllers\ViewController;
require_once ROOT."controllers/ViewController.php";
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'enviarEmail') {
        require_once ROOT."controllers/EmailController.php";
        $emailSend = new EmailController( $_POST['nombre'] ?? null, $_POST['email'] ,$_POST['telefono'], $_POST['mensaje'] ?? null);
        $emailSend->enviarEmailValidando();
    }
   
}
$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();


