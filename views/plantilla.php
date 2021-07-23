<?php
// use App\Controllers\ViewController;
// use App\Controllers\LoginController;
// require_once APP. 'controllers/ViewController.php';
require_once "./controllers/ViewController.php";

session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include INCLUDES . "head.php"; ?>	
</head>
<body >
    
    <?php 
        if(isset($_GET['views'])){
            $pagina=explode("/", $_GET['views']);
        }else{
            $pagina=[];
        }

        /*---------- Instancia controlador login ----------*/
        // require_once "./controladores/loginControlador.php";
        // $ins_login = new LoginController();
        $ins_vistas = new ViewController();

        $vistas= ViewController::obtener_vistas_controlador("web");
           
            
        if(isset($pagina[0]) && 'admin'==$pagina[0]){

            /*---------- Dashboard ----------*/
            $vistas=$ins_vistas->obtener_vistas_controlador("dashboard");

            if($vistas=="login" || $vistas=="404"){
                // require_once "./views/contenidos/".LANG."/web-".$vistas.".php";
                require_once VIEWS . "contents/web-".$vistas.".php";
            }else{

                /*-- Comprobando acceso del usuario - Checking user access --*/
               
    ?>
                <!-- Main container -->
                <!-- <main class="full-box main-container">
                    <!-- Nav lateral -->
                    <?php //include "./vistas/inc/".LANG."/nav_lateral.php"; ?>

                    <!-- Page content -->
                    <section class="full-box page-content scroll">

                        <!-- Nav bar -->
                        <?php //include "./vistas/inc/".LANG."/nav_bar.php"; ?> 

                        <?php 
                            /*---------- Vista ----------*/
                            require_once $vistas;
                        ?>
<!-- 
                    </section>
                </main>  -->
    <?php
                include "./vistas/inc/log_out_admin.php";
            }
        }else{

            /*---------- Web ----------*/
            $vistas=$ins_vistas->obtener_vistas_controlador("web");

            if($vistas=="404"){
                // require_once "./vistas/contenidos/".LANG."/web-404.php";
                require_once VIEWS . "contents/web-404.php";
                
            }else{
                /*---------- Header ----------*/
                // include "./vistas/inc/".LANG."/header.php";
                include_once INCLUDES .'navbar.php';  
                /*---------- Vista ----------*/
                require_once $vistas;

                /*---------- Footer ----------*/
                // include "./vistas/inc/".LANG."/footer.php";

                if(isset($_SESSION['cargo_sto']) && ($_SESSION['cargo_sto']=="Administrador" || $_SESSION['cargo_sto']=="Cajero")){
                    include "./vistas/inc/log_out_admin.php";
                }
            }
        }




            // include_once INCLUDES .'navbar.php'; 
            // if($vistas=="404"){
            //     require_once VIEWS . "contents/web-404.php";
            // }else{
            //     require_once $vistas;
            // }
    ?>
</body>
</html>