<?php
require_once "./clases/Database.php";

class Usuario{

	private $idUsuario;
	private $UserName;
	private $NombreUsuario;
	private $CorreoUsuario;
	private $ApellidosUsuario;
	private $FechaNanUsuario;
	private $PassUsuario;

	public static function searchByEmailAndPassword(string $UserName,	string $PassUsuario): ?Usuario {
		$db  = Database::getInstancia();
		$total = $db->consulta("SELECT * FROM usuario WHERE UserName='$UserName' AND PassUsuario='" . md5($PassUsuario) . "' ;")
			->total();
		return ($total) ? $db->recuperar("Usuario") : null;
	}
}
