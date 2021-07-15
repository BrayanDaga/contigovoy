<?php

	 require_once APP . "models/RouteView.php";

	 class ViewController extends RouteView{

	 	/*---------- Controlador obtener plantilla ----------*/
	 	public function obtener_plantilla_controlador(){
	 		return require_once VIEWS ."plantilla.php";
	 	}

	 	/*---------- Controlador obtener vistas ----------*/
	 	public function obtener_vistas_controlador($modulo){
	 		if(isset($_GET['views'])){
	 			$ruta=explode("/", $_GET['views']);

	 			if($modulo=="dashboard"){
	 				if(isset($ruta[1]) && $ruta[1]!=""){
	 					$vista=$ruta[1];
	 				}else{
	 					$vista="";
	 				}
	 			}else{
	 				$vista=$ruta[0];
	 			}

	 			if($vista!=""){
	 				$respuesta=RouteView::obtener_views_modelo($vista,$modulo);
	 			}else{
	 				if($modulo=="dashboard"){
	 					$respuesta="login";
	 				}else{
	 					$respuesta=VIEWS . "contents/web-index.php";
	 				}
	 			}
	 		}else{
	 			if($modulo=="dashboard"){
	 				$respuesta="login";
	 			}else{
					$respuesta=VIEWS . "contents/web-index.php";
	 			}
	 		}
	 		return $respuesta;
	 	}
	 }