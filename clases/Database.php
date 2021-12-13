<?php

	error_reporting(E_ERROR) ;
	ini_set("display-errors",0) ;

	class Database {

		private static ?Database $instancia = null;
		private $result ;
		private $mysqli ;

		private function __clone() { }

		/**
		 * Realizamos la conexión con el servidor de bases de datos
		 */
		private function __construct() 
		{ 
			$this->mysqli = new mysqli("localhost","root",".Juan2pedroo","shishaword") ;

			if ($this->mysqli->connect_errno)
				throw new Exception("Se ha producido un error de conexión con la base de datos.") ;
			//
			$this->mysqli->set_charset("utf8mb4") ;			
		}

		/**
		 * Instanciamos la clase Database si no se ha hecho previamente,
		 * y devolvemos dicha instancia.
		 */
		public static function getInstancia() 
		{
			if (self::$instancia==null) self::$instancia = new Database ;
			return self::$instancia ;
		}

		public function consulta(string $sql):Database {

			// escapamos la consulta
			//$sql = $this->mysqli->real_escape_string($sql) ;

			// hacemos la consulta
			$this->result = $this->mysqli->query($sql) ;

			//
			return $this ;
		}

		public function recuperar(string $clas = "StdClass") {
			return $this->result->fetch_object($clas) ;
		}

		public function recuperarTodos(string $clas = "StdClass"):array {

			$datos = [] ;

			while($item = $this->recuperar($clas))
				array_push($datos, $item) ;
			//
			return $datos ;
		}


		public function total():?int {
			return $this->result->num_rows ;
		}


		/**
		 * Cerramos la conexión de la base de datos cuando el 
		 * objeto se destruye.
		 */
		public function __destruct() {
			$this->mysqli->close() ;			
		}
	}
