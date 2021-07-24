<?php 
// namespace App\Models;
	class RouteView{
		/*---------- Modelo obtener vistas ----------*/
		protected static function obtener_views_modelo($vistas,$modulo){
			$lista_blanca=["home","servicios","conocenos","contactanos","modalidad","blog","material"];
			if(in_array($vistas, $lista_blanca)){
				if(is_file(VIEWS ."contents/".$modulo."-".$vistas.".php")){
					$contenido=VIEWS ."contents/".$modulo."-".$vistas.".php";
				}else{
					$contenido="404";
				}
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}