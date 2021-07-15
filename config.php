<?php 
define('IS_LOCAL' , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));
define('URL', (IS_LOCAL ? 'http://contigovoy.test/' : 'LA URL DE SU SERVIDOR EN PRODUCCIÓN'));

define('DS'       , DIRECTORY_SEPARATOR);
define('ROOT'     , getcwd().DS);
define('APP'      , ROOT.'app'.DS);
define('VIEWS', ROOT.'views'.DS);
define('CONTENTS', VIEWS.'contents'.DS);
define('INCLUDES' , VIEWS.'includes'.DS);

define('CSS'      , URL.'public/css/');
define('IMAGES'      , URL.'public/images/');
define('JS'       , URL.'public/js/');