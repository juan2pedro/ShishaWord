<?php

	require_once "Database.php" ;

	class Marca {


		private $idMarca ;
		private $nombreMarca ;
		private $paisMarca ;
		private $webMarca;
		private $vendeSabores;
		private $logoMarca;
		

		public function __get($key) {
			if (property_exists("Marca", $key)) return $this->$key ;
			throw new Exception ;
		}

		/*public function setTitulo($valor)     { 
			$this->titulo = $valor ;
		}

		public function setFecha($valor)      { 
			$this->fecha = $valor ;
		}

		public function setPuntuacion($valor) { 
			$this->puntuacion = $valor ; 
		}
		public function setArgumento($valor)  { 
			$this->argumento = $valor ;
		}*/

		public function __set($key, $value) 
		{			
			switch($key):
				case "nombre"    :
				case "pais"     :
				case "web" :
				case "sabores" :
				case "logo"    : $this->$key = $value ; 
								break ;
				default: 
					throw new Exception ;
			endswitch ;
		}

		public function actualizar() 
		{
			$db = Database::getInstancia() ;
			$sql = "UPDATE shishaword.marcas SET nombreMarca = '{$this->nombreMarca}', paisMarca = {$this->paisMarca}, webMarca = {$this->webMarca}, vendeSabores = {$this->vendeSabores}, logoMarca = {$this->logoMarca} WHERE idMarca={$this->idMarca}	;" ;

			$db->consulta($sql) ;
		}


		/**
		 */
		public static function searchAllShows($pag, $max):array
		{
			$ini = ($pag-1)*$max ;

			$db = Database::getInstancia() ;
			$db->consulta("SELECT idMarca, nombreMarca, paisMarca,webMarca, logoMArca FROM marcas LIMIT $ini, $max ;") ;

			return $db->recuperarTodos("Marca") ;			
		}

		public static function searchShowById($id):?Marca
		{
			$db = Database::getInstancia() ;
			$db->consulta("SELECT * FROM serie WHERE idSer=$id ;") ;
			return $db->recuperar("Marca") ;
		}

		/**
		 */
		public static function totalShows():int
		{
			$db = Database::getInstancia() ;
			return $db->consulta("SELECT * FROM marcas ;")
					->total() ;
		}


	}
