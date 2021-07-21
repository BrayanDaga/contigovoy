<?php

namespace App\Models;

use PDO;
use PDOException;

class MainModel
{

	public static function conectar()
	{
		try {
			$conexion = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";charset=utf8", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $conexion;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	/*----------  Funcion desconectar de DB - Function disconnect from DB  ----------*/
	public function desconectar($consulta)
	{
		global $conexion, $consulta;
		$consulta = null;
		$conexion = null;
		return $consulta;
	} /*--  Fin Funcion - End Function --*/
}
