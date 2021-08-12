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
        $dataSend = [
            'nombres' => $_POST['nombres'],
            'paterno' => $_POST['paterno'],
            'materno' => $_POST['materno'],
            'correo' => $_POST['correo'],
            'celular' => $_POST['celular'],
            'edad' => $_POST['edad'],
            'tutor' => $_POST['tutor'],
            'psicologa' => $_POST['psicologa'],
            'especialidad' => $_POST['especialidad'],
            'consulta' => $_POST['consulta'],
            'fechaCita' => $_POST['fechacita'],
            'horaCita' => $_POST['horacita'],
            'tipdoc' => $_POST['tipdoc'],
            'nrodoc' => $_POST['nrodoc'],        
       ];
       $emailSend = new EmailController( $dataSend);
        $emailSend->usarPhpMailer();
     }
   
}
$plantilla = new ViewController();
$plantilla->obtener_plantilla_controlador();


