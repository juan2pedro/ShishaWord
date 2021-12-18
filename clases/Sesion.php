<?php
//Clase para manejar la sesion
use Sesion as GlobalSesion;

require_once "./clases/Usuario.php";

class Sesion{
	private static ?Sesion $instancia = null;

	private function __clone()	{
	}

	private function __construct()	{
	}

	// Instanciamos la clase Sesion si no se ha hecho previamente, y devolvemos dicha instancia.
	public static function Sesion(): Sesion{
		if (self::$instancia == null) self::$instancia = new Sesion;
		return self::$instancia;
	}

	public function login(string $user, string $pas): bool{
		session_start();

		$usuario = Usuario::searchByEmailAndPassword($user, $pas);

		if (!is_null($usuario)) :

			$_SESSION["_user"] = serialize($usuario);
			header("Location: ./paginas/home.php");
			die();
		endif;

		return false;
	}
}
