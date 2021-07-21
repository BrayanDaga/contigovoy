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

	/*----------  Funcion limpiar cadenas - Function to clean text strings ----------*/
	protected static function limpiar_cadena($cadena)
	{
		$cadena = trim($cadena);
		$cadena = stripslashes($cadena);
		$cadena = str_ireplace("<script>", "", $cadena);
		$cadena = str_ireplace("</script>", "", $cadena);
		$cadena = str_ireplace("<script src", "", $cadena);
		$cadena = str_ireplace("<script type=", "", $cadena);
		$cadena = str_ireplace("SELECT * FROM", "", $cadena);
		$cadena = str_ireplace("DELETE FROM", "", $cadena);
		$cadena = str_ireplace("INSERT INTO", "", $cadena);
		$cadena = str_ireplace("DROP TABLE", "", $cadena);
		$cadena = str_ireplace("DROP DATABASE", "", $cadena);
		$cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
		$cadena = str_ireplace("SHOW TABLES;", "", $cadena);
		$cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
		$cadena = str_ireplace("<?php", "", $cadena);
		$cadena = str_ireplace("?>", "", $cadena);
		$cadena = str_ireplace("--", "", $cadena);
		$cadena = str_ireplace("^", "", $cadena);
		$cadena = str_ireplace("<", "", $cadena);
		$cadena = str_ireplace(">", "", $cadena);
		$cadena = str_ireplace("[", "", $cadena);
		$cadena = str_ireplace("]", "", $cadena);
		$cadena = str_ireplace("==", "", $cadena);
		$cadena = str_ireplace(";", "", $cadena);
		$cadena = str_ireplace("::", "", $cadena);
		$cadena = trim($cadena);
		$cadena = stripslashes($cadena);
		return $cadena;
	} /*--  Fin Funcion - End Function --*/


	/*---------- Funcion verificar datos (expresion regular) - Check data function (regular expression) ----------*/
	protected static function verificar_datos($filtro, $cadena)
	{
		if (preg_match("/^" . $filtro . "$/", $cadena)) {
			return false;
		} else {
			return true;
		}
	} /*--  Fin Funcion - End Function --*/


	/*---------- Funcion datos tabla - Table data function ----------*/
	public function datos_tabla($tipo, $tabla, $campo, $id)
	{
		$tipo = self::limpiar_cadena($tipo);
		$tabla = self::limpiar_cadena($tabla);
		$campo = self::limpiar_cadena($campo);

		$id = self::limpiar_cadena($id);

		if ($tipo == "Unico") {
			$sql = self::conectar()->prepare("SELECT * FROM $tabla WHERE $campo=:ID");
			$sql->bindParam(":ID", $id);
		} elseif ($tipo == "Normal") {
			$sql = self::conectar()->prepare("SELECT $campo FROM $tabla");
		}
		$sql->execute();

		return $sql;
	} /*-- Fin Funcion - End Function --*/
}
