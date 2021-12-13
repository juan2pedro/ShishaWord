<?php

require_once "../clases/modelos.php";
session_start();
if(!isset($_SESSION["_user"])){
    header("Location: ../index.php");
}
if (!empty($_POST)):
$id = $_POST["id"];

$Modelo = Modelo::searchModelById($id);

$Modelo ->idModelo = $_POST["id"];
$Modelo ->nombreModelo = $_POST["nombre"];
 $Modelo ->fechaModelo = $_POST["fecha"];
 $Modelo ->descripcionModelo = $_POST["descripccion"];
 $Modelo ->precioModelo = $_POST["precio"];
 $Modelo->actualizar() ;

 header("location: home.php") ;
 die() ;

endif;
$id = $_GET["idModelo"]??"" ;
$Modelo = Modelo::searchModelById($id);
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
   <!-- Bootstrap CSS -->


   <link rel="icon" type="image/x-icon" href="../media/favicon-32x32.png">
   <!-- Bootstrap  y Popper js  -->


   <title>Shisha world!</title>
   <meta http-equiv="Expires" content="0">
   <meta http-equiv="Last-Modified" content="0">
   <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
   <meta http-equiv="Pragma" content="no-cache">

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
            <li class="nav__list-item active-nav"><a href="#" class="hover-target">Modelo</a></li>
            <li class="nav__list-item"><a href="#" class="hover-target">Añadir</a></li>
            <li class="nav__list-item"><a href="#" class="hover-target">Perfil</a></li>
            <li class="nav__list-item"><a href="https://www.google.com/" class="hover-target">Salir</a></li>
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

         <?php
         if (empty($_GET)) :
         ?>
            <div class="alert alert-danger">
               No se han encontrado registros
            </div>
         <?php
         else :
            echo " <div class=\"row\">";
         ?>

            <div class="col-lg-4 col-md-6 mb-2-6  top-buffer my-3">
               <article class="card card-style2 ">
                  <div class="card-img">
                     <img class="rounded-top" src="<?= (is_null($Modelo->srcModelo)) ? "../media/Modelos/pordefecto.jpg" : $Modelo->srcModelo ?>" />
                     <div class="date"><span><?= (is_null($Modelo->fechaModelo)) ? "0000" : $Modelo->fechaModelo ?></div>
                  </div>
                  <div class="card-body">
                     <h3 class="h5"><a href="actualizar.php?idModelo=<?= ($Modelo->idModelo) ?>"><?= (is_null($Modelo->nombreModelo)) ? "Marca erronea" : $Modelo->nombreModelo ?></a>
                     </h3>
                     <p class="display-30">
                        <?= (is_null($Modelo->descripcionModelo)) ? "Descripción rrronea" : $Modelo->descripcionModelo ?>
                     </p>
                     <a href="../clases/eliminar.php?idModelo=<?= $Modelo->idModelo ?>"   class="read-more">Eliminar</a>
                  </div>
                  <div class="card-footer">
                     <ul>
                        <li><a href="#!"><i class="fas fa-user"></i><?= (is_null($Modelo->nombreMarca)) ? "Marca erronea" : $Modelo->nombreMarca ?></a></li>
                        <li><a href="#!"><i class="far fa-comment-dots"></i><span><?= (is_null($Modelo->precioModelo)) ? "Precio erroneo" : $Modelo->precioModelo ?> €</span></a></li>
                     </ul>
                  </div>
               </article>
            </div>
            <div class="col-md-5">
               <h4><strong>Editar modelo</strong></h4>
               <form method="post">
                  <input type="hidden" name="id" value="<?= $id ?>"/>
                  <div class="form-group">
                     <input type="text" id="nombre" class="form-control" name="nombre" value="<?= $Modelo->nombreModelo?>" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                     <input type="number" id="fecha" class="form-control" name="fecha" value="<?= $Modelo->fechaModelo?>" placeholder="Fecha">
                  </div>
                  <div class="form-group">
                     <input type="number" id="precio" class="form-control" name="precio" value="<?= $Modelo->precioModelo?>" placeholder="Precio">
                  </div>
                  <div class="form-group">
                     <textarea class="form-control" id="descripcion" name="descripcion" value="<?= $Modelo->descripcionModelo?>" rows="3" placeholder="Descripción"></textarea>
                  </div>
                  <button class="btn-w btn-primary">Editar </button>
                  <a href="home.php" class="btn btn-danger">Cancelar</a>
               </form>
            </div>
      </div>

   </section>

   <script src="../script/home.js"></script>
</body>
<?php endif; ?>

</html>