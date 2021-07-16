<?php 
namespace App\Models;
	class RouteView{
		/*---------- Modelo obtener vistas ----------*/
		protected static function obtener_views_modelo($vistas,$modulo){
			$lista_blanca=["index","signin","product","home","registration","bag","details","admin-new","admin-list","admin-search","admin-update","client-new","client-list","client-search","client-update","category-new","category-list","category-search","category-update","company","servicios","conocenos"];
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