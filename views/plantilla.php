<?php
session_start()
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include INCLUDES . "head.php"; ?>	
</head>
<body >
    
    <?php include_once INCLUDES .'navbar.php';  
        if(isset($_GET['views'])){
            $pagina=explode("/", $_GET['views']);
        }else{
            $pagina=[];
        }

        require_once APP ."controllers/ViewController.php";
        $ins_vistas = new ViewController();         

            $vistas=$ins_vistas->obtener_vistas_controlador("web");
            if($vistas=="404"){
                require_once VIEWS . "contents/web-404.php";
            }else{
                require_once $vistas;
            }
        
        
    ?>
</body>
</html>