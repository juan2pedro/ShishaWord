<?php

	require_once "./clases/Usuario.php" ;

	Class Sesion {

		private static ?Sesion $instancia = null ;

		private function __clone() {}
		private function __construct() {}

		/**
		 * Instanciamos la clase Sesion si no se ha hecho previamente,
		 * y devolvemos dicha instancia.
		 */
		public static function Sesion():Sesion {

			if(self::$instancia==null) self::$instancia = new Sesion ;
			return self::$instancia ;
		}

		public function login(string $user, string $pas):bool {

			//
			$usuario = Usuario::searchByEmailAndPassword($user, $pas) ;

			if (!is_null($usuario)):

				session_start() ;
				$_SESSION["_user"] = serialize($usuario) ;
				$_SESSIOn["time"]  = time() ;
 				header("Location:./paginas/home.php") ;
				die() ;

			endif ;

			return false ;
		}


	}