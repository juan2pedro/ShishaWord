<?php
//Clase para cerrar la sesion.
session_start();
$_SESSION = [];
//Destruimos la sesion
session_destroy();
//Volvemos al index.php donde se encuentra el login
header("Location: ../index.php");
?>