<?php
//importamos la clase modelo
require_once "../clases/modelos.php";
//iniciamos la sesion
session_start();
if (!isset($_SESSION["_user"])) {
    //si la sesion no es correcta lo devolvemos al login
    header("Location: ../index.php");
}
//Recogemos la informacion de lo modelos de la BBDD y la convertimos en objetos para despues mostrarlos
$datos = Modelo::searchAllModelos();

//Importamos el control de sesion para el tiempo
require_once("../clases/timeout.php");
?>

<!doctype html>
<html lang="es">

<head>
    <!-- estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../estilos/home.css" rel="stylesheet">
    <!-- links-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->


    <link rel="icon" type="image/x-icon" href="../media/favicon.ico">
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
                <a href="#" class="hover-target"><span>Shisha</span>Word!</a>
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
                <li class="nav__list-item active-nav"><a href="#" class="hover-target">Home</a></li>
                <li class="nav__list-item"><a href="./nuevoModelo.php" class="hover-target">Añadir Modelo</a></li>
                <li class="nav__list-item"><a href="../clases/salir.php" class="hover-target">Salir</a></li>
            </ul>
        </div>
    </div>

    <div class="section full-height over-hide">
        <div class="switch-wrap">
            <section>
                <p class="text">
                    shishaword
                </p>
            </section>
            <p>Tenemos la mayor base de datos.</p>
        </div>
    </div>

    <div class='cursor' id="cursor"></div>
    <div class='cursor2' id="cursor2"></div>
    <div class='cursor3' id="cursor3"></div>

    <section>
        <div class="container">
            <?php
            //Si no hemos podido recuperar la informacion de la BBDD salta un error
            if (empty($datos)) :
            ?>
                <div class="alert alert-danger">
                    No se han encontrado registros
                </div>
                <?php
            else :
                $i = 0;
                while ($i < count($datos)) :
                    //Si esta todo correcto continua rellenando la informacion de los diferentes modelos con un bucle
                    echo " <div class=\"row\">";
                    while (($i < count($datos))) :
                ?>
                        <div class="col-lg-4 col-md-6 mb-2-6  top-buffer my-3">
                            <article class="card card-style2 ">
                                <div class="card-img">
                                    <img class="rounded-top" src="<?= (is_null($datos[$i]->srcModelo)) ? "../media/Modelos/pordefecto.jpg" : $datos[$i]->srcModelo ?>" />
                                    <div class="date"><span><?= (is_null($datos[$i]->fechaModelo)) ? "0000" : $datos[$i]->fechaModelo ?></div>
                                </div>
                                <div class="card-body">
                                    <h3 class="h5"><a href="actualizar.php?idModelo=<?= ($datos[$i]->idModelo) ?>"><?= (is_null($datos[$i]->nombreModelo)) ? "Marca erronea" : $datos[$i]->nombreModelo ?></a>
                                    </h3>
                                    <p class="display-30">
                                        <?= (is_null($datos[$i]->descripcionModelo)) ? "Descripción erronea" : $datos[$i]->descripcionModelo ?>
                                    </p>
                                    <a href="../clases/borrar.php?idModelo=<?= ($datos[$i]->idModelo) ?>" class="read-more eliminados">Eliminar modelo</a>
                                </div>
                                <div class="card-footer">
                                    <ul>
                                        <li><i class="fas fa-user"></i><?= (is_null($datos[$i]->nombreMarca)) ? "Marca erronea" : $datos[$i]->nombreMarca ?></li>
                                        <li><i class="far fa-comment-dots"></i><span><?= (is_null($datos[$i]->precioModelo)) ? "Precio erroneo" : $datos[$i]->precioModelo ?> €</span></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                <?php
                        $i++;;
                    endwhile;
                endwhile;
                ?>
        </div>
    </section>
    <script src="../script/home.js"></script>
    <script src="../script/smoke.js">window.onload = smokee;</script>
    
</body>
<?php endif; ?>

</html>