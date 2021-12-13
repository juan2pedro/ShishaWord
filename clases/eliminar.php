<?php
   require_once("modelos.php");
   $Modelo= $_GET["idModelo"];
   Modelo::borrar($Modelo);
   header("Location: ../paginas/home.php");
?>