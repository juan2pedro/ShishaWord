<?php
//importamos la clase base de datos
require_once "Database.php";
//Creamos la clase modelo
class Modelo{
   //Definimos las variables
   private $idModelo;
   private $nombreModelo;
   private $srcModelo;
   private $idMarca;
   private $fechaModelo;
   private $descripcionModelo;
   private $precioModelo;
   private $nombreMarca;

   public function __get($key){
      if (property_exists("Modelo", $key)) return $this->$key;
      throw new Exception;
   }

   public function __set($key, $value) {
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

   //Las consultas realizadas abajo tienen todas un patron similar, por eso solo explico la primera

   //Declaramos la clase actualizar con su consulta MYSQL
   public function actualizar(){ //Creamos la instancia
      $db = Database::getInstancia();
      //Definimos la consulta que  queremos realizar
      $sql = "UPDATE shishaword.modelos SET nombreModelo = '{$this->nombreModelo}', fechaModelo = '{$this->fechaModelo}', descripcionModelo = '{$this->descripcionModelo}', precioModelo = '{$this->precioModelo}' WHERE idModelo = '{$this->idModelo}'	;";
      //Realizamos la consulta
      $db->consulta($sql);
   }

   //Declaramos la clase para BUSCAR TODOS los MODELOS con su consulta MYSQL
   public static function searchAllModelos(): array{

      $db = Database::getInstancia();
      $db->consulta("SELECT idModelo, nombreModelo, nombreMarca, fechaModelo, descripcionModelo, srcModelo, precioModelo FROM modelos INNER JOIN marcas ON modelos.idMarca = marcas.idMarca;");

      return $db->recuperarTodos("Modelo");
   }
   //Declaramos la clase para BUSCAR 1 Modelo con una ID concreta con su consulta MYSQL
   public static function searchModelById($id): ?Modelo{
      $db = Database::getInstancia();
      $db->consulta("SELECT * FROM modelos WHERE idModelo = $id ;");
      return $db->recuperar("Modelo");
   }

   //Declaramos la clase BORRAR Modelo con un ID concreta  con su consulta MYSQL
   public static function borrar($id){
      $db = Database::getInstancia();
      $db->consulta("DELETE FROM modelos WHERE idModelo = '$id' ;");
   }
   //Declaramos la clase AÑADIR MODELO con su consulta MYSQL
   public static function agregar($nombreModelo, $idMarca, $fechaModelo, $descripcionModelo, $precioModelo) {
      $db = Database::getInstancia();
      $sql = "INSERT INTO `shishaword`.`modelos`(`idModelo`,`nombreModelo`, `srcModelo`,`idMarca`,`fechaModelo`, `descripcionModelo`,`precioModelo`) VALUES( null, '$nombreModelo', null, '$idMarca', $fechaModelo, '$descripcionModelo', $precioModelo)";
      $db->consulta($sql);
   }
}
