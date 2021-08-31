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
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_STRINGIFY_FETCHES => false,
    ]
);

$f3->set('DB', $db); //asignar la conexion a la base de datos

$timeCache = 120; // 2 minutes	de cache    

/****************************  RUTAS  **********************************************/
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
$f3->route('GET /blog/@slug/edit', 'controllers\BlogController->edit');
$f3->route('POST /blog/@slug/edit', 'controllers\BlogController->update');
$f3->route('POST /blog/@slug/delete', 'controllers\BlogController->destroy');



$f3->redirect('GET|HEAD /admin', '/login');


$f3->set('ONERROR', function ($f3) {
	$f3->set('content', '404.html');
	echo \Template::instance()->render('views/template.php');
});



$f3->route('GET /upload', function($f3){
    ?>
    
    <p>Pleaseonly upload jpg, get , or png files.</p>
    <form action="upload" method="post" enctype="multipart/form-data">
    <input type="text" name="mytext">
    <input type="file" name="myfile">
    <input type="submit" value="Upload">
    </form>
    
    <?php
    });
    
    $f3->route('POST /upload', function($f3){
    
    
       
        $files = Web::instance()->receive(function($file,$formFieldName){
     
                if($file['size'] > (2 * 1024 * 1024)) 
                return true; // allows the file to be moved from php tmp dir to your defined upload dir
            },true,
            function($fileBaseName, $formFieldName){
                $ext = pathinfo($fileBaseName, PATHINFO_EXTENSION);
                $new_name = time() . '.' . $ext;
                return $new_name;
    
            }
        );    

        // var_dump($files);
        echo array_keys($files)[0];
    });

$f3->run();
