<?php
//Clase para controlar la duracion de las sesionm la cual la tenemos que importar en todas las paginas

//Duracion de la sesion de 30m si esta inactivo
$inactivo = 1800;
///Comprobamos la duracion de la sesion
if (isset($_SESSION['time'])) {
   $vida_session = time() - $_SESSION['time'];
   if ($vida_session > $inactivo) {
      //Desctuiimos la sesion
      session_destroy();
      //Lo devolvemos al login
      header("Location: ../index.php");
   }
}
$_SESSION["time"]  = time();
