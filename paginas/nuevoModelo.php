<?php
//importamos la clase modelos
require_once "../clases/modelos.php";
//inicamos la sesion
session_start();
if (!isset($_SESSION["_user"])) {
   //si el usuario y contraseña es erroreno lo devolvemos al login
   header("Location: ../index.php");
}
//si tenemos informacion del POST (al enviar el formulario para añadir la informacion),

if (!empty($_POST)) :
   //Guardamos la informacion en variables
   $nombreModelo = $_POST["nombre"];
   $idMarca = $_POST["idMarca"];
   $fechaModelo = $_POST["fecha"];
   $descripcionModelo = $_POST["descripcion"];
   $precioModelo = $_POST["precio"];
   //Mandamos la consulta
   Modelo::agregar($nombreModelo, $idMarca, $fechaModelo, $descripcionModelo, $precioModelo);
   //volvemos a la pagina home
   header("location: home.php");
   die();

endif;
//controlamos la sesion
require_once("../clases/timeout.php");

?>

<!doctype html>
<html lang="es">

<head>
   <!-- estilos -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link href="../estilos/actualizar.css" rel="stylesheet">
   <!-- links-->

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
   </script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Shisha world!</title>
   <meta http-equiv="Expires" content="0">
   <meta http-equiv="Last-Modified" content="0">
   <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
   <meta http-equiv="Pragma" content="no-cache">
   <link rel="icon" type="image/x-icon" href="../media/favicon.ico">

</head>

<body>

   <header class="cd-header">
      <div class="header-wrapper">
         <div class="logo-wrap">
            <a href="home.html" class="hover-target"><span>Shisha</span>Word!</a>
         </div>
         <div class="nav-but-wrap">
            <div class="menu-icon hover-target">
               <span class="menu-icon__line menu-icon__line-left"></span>
               <span class="menu-icon__line"></span>
               <span class="menu-icon__line menu-icon__line-right"></span>
            </div>
         </div>
      </div>
   </header>

   <div class="nav">
      <div class="nav__content">
         <ul class="nav__list">
            <li class="nav__list-item"><a href="home.php" class="hover-target">Home</a></li>
            <li class="nav__list-item active-nav"><a href="#" class="hover-target">Añadir Modelo</a></li>
            <li class="nav__list-item"><a href="../clases/salir.php" class="hover-target">Salir</a></li>
         </ul>
      </div>
   </div>

   <div class="section full-height over-hide">
      <div class="switch-wrap">
         <h1>Shisha Word!</h1>
         <p>Tenemos la mayor base de datos.</p>
      </div>
   </div>

   <div class='cursor' id="cursor"></div>
   <div class='cursor2' id="cursor2"></div>
   <div class='cursor3' id="cursor3"></div>
   <section>
      <div class="container">
   <!-- Captamos la informacion para reenviarla a esta misma pagina y guardar la informacion -->
         <div class="col-md-5">
            <h4><strong>Editar modelo</strong></h4>
            <form method="post">
               <div class="form-group">
                  <h4>Nombre del modelo:</h4>
                  <input type="text" id="nombre" class="form-control" name="nombre" value="" placeholder="Nombre">
               </div>
               <div class="form-group">
                  <h4>Año de salida:</h4>
                  <input type="number" id="fecha" class="form-control" name="fecha" value="" placeholder="Fecha">
               </div>
               <div class="form-group">
                  <h4>ID de la Marca</h4>
                  <input type="number" id="idMarca" class="form-control" name="idMarca" value="" placeholder="idMarca">
               </div>
               <div class="form-group">
                  <h4>Precio</h4>
                  <input type="number" id="precio" class="form-control" name="precio" value="" placeholder="Precio">
               </div>
               <div class="form-group">
                  <h4>Descripcion del modelo:</h4>
                  <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripción"></textarea>
               </div>
               <button class="btn-w btn-primary" type="submit">Añadir </button>
               <a href="home.php" class="btn btn-danger">Cancelar</a>
            </form>
         </div>
      </div>

   </section>

   <script src="../script/home.js"></script>
</body>

</html>