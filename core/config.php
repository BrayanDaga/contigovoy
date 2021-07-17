<?php 
define('URL',  $_ENV ? $_ENV['APP_URL'].'/' : 'localhost/' );
define('DS'       , DIRECTORY_SEPARATOR);
define('ROOT'     , getcwd().DS);
define('APP'      , ROOT.'app'.DS);
define('VIEWS', ROOT.'views'.DS);
define('CONTENTS', VIEWS.'contents'.DS);
define('INCLUDES' , VIEWS.'includes'.DS);

define('CSS'      , URL.'public/css/');
define('IMAGES'      , URL.'public/images/');
define('JS'       , URL.'public/js/');