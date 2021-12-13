<?php

require_once "Database.php";

class Modelo
{

   private $idModelo;
   private $nombreModelo;
   private $srcModelo;
   private $idMarca;
   private $fechaModelo;
   private $descripcionModelo;
   private $precioModelo;
   private $nombreMarca;



   public function __get($key)
   {
      if (property_exists("Modelo", $key)) return $this->$key;
      throw new Exception;
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
      switch ($key):
         case "idModelo":
         case "nombreModelo":
         case "srcModelo":
         case "idMarca":
         case "fechaModelo":
         case "descripcionModelo":
         case "precioModelo":
            $this->$key = $value;
            break;
         default:
            throw new Exception;
      endswitch;
   }

   public function actualizar()
   {
      $db = Database::getInstancia();
      $sql = "UPDATE shishaword.modelos SET nombreModelo = '{$this->nombreModelo}', srcModelo = '{$this->srcModelo}', fechaModelo = '{$this->fechaModelo}', descripcionModelo = '{$this->descripcionModelo}', precioModelo = '{$this->precioModelo}' WHERE idModelo = '{$this->idModelo}'	;";

      $db->consulta($sql);
   }


   /**
    */
   public static function searchAllShows(): array
   {

      $db = Database::getInstancia();
      $db->consulta("SELECT idModelo, nombreModelo, nombreMarca, fechaModelo, descripcionModelo, srcModelo, precioModelo FROM modelos INNER JOIN marcas ON modelos.idMarca = marcas.idMarca;");

      return $db->recuperarTodos("Modelo");
   }

   public static function searchModelById($id): ?Modelo
   {
      $db = Database::getInstancia();
      $db->consulta("SELECT * FROM modelos WHERE idModelo = $id ;");
      return $db->recuperar("Modelo");
   }


   public static function borrar($id){
      $db = Database::getInstancia();
      $db->consulta("DELETE FROM modelos WHERE idModelo = '$id' ;");
   }

}
