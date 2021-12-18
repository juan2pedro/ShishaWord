<?php
// importados la clase modelo
require_once "Modelos.php";
// guardamos el id que queremos borrar
$id = $_GET["idModelo"] ?? "";
//llamamos a la funcion para borrar el modelo
Modelo::borrar($id);
//Una vez realizado el borrado nos devuelve al home
header("Location: ../paginas/home.php");
?>