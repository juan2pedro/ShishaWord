<?php
	require_once "Database.php" ;

	class Usuario {

		private $idUsuario ;
      private $UserName;
		private $CorreoUsuario ;
		private $PassUsuario ;
		private $NombreUsuario ;
		private $ApellidosUsuario ;
      private $FechaNanUsuario;

		public static function searchByEmailAndPassword(string $UserName, 
														string $PassUsuario):?Usuario 
		{			
			$db  = Database::getInstancia() ;
			$total = $db->consulta("SELECT * FROM usuario WHERE UserName='$UserName' AND pass='".md5($PassUsuario)."' ;")
						->total() ;
			//
			return ($total)?$db->recuperar("Usuario"):null ;
			
			/*if ($total) return $db->recuperar("Usuario") ;
			else return null ;*/
		}

	}
