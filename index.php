<?php
	$user = $_POST["user"]??"" ;
	$pas = $_POST["pas"]??"" ;

    require_once "./clases/Sesion.php" ;

	if ($user!="" and $pas!==""):
		$sesion = Sesion::sesion() ;
		if (!$sesion->login($user, $pas)) $error = "Email o contraseña incorrecta" ;
	endif;

?>

<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- index CSS -->
    <link href="estilos/index.css" rel="stylesheet">
    <!-- Bootstrap  y Popper js  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Links del snippet ---------->
    <script src="script/login.js"></script>
    <title>Shisha world!</title>

</head>


<body>
    <div class="container">
        <div class="frame">
            <div class="nav">
                <ul class="links">
                    <li class="signin-active"><a class="btn">Iniciar Sesión</a></li>
                    <li class="signup-inactive"><a class="btn">Registrarse</a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin"  method="POST" name="form"> <label for="user">Usuario</label>
                    <input class="form-styling" type="text" name="user" placeholder="" value="<?= $user ?>"/> <label
                        for="pas">Contraseña</label> <input class="form-styling" type="password" name="pas"
                        placeholder="" value="<?= $pas ?>" /> <input type="checkbox" id="checkbox" /> <!--   <label for="checkbox"><span
                            class="ui"></span>Mantener sesión iniciada</label> -->
                <!--    <div class="btn-animate"> <a class="btn-signin">Entrar</a> </div>-->
                    <button class="btn-animate btn-signin">Entrar</button> 
                </form>

                
                <form class="form-signup" method="POST" name="form">
                    <label for="fullname">Nombre de Usuario</label>
                    <input class="form-styling" type="text" name="fullname" placeholder="" />
                    <label for="email">Email</label> <input class="form-styling" type="text" name="email"
                        placeholder="" />
                    <label for="fecNan">Fecha de nacimiento</label> <input class="form-styling" type="date"
                        name="fecNan" placeholder="" />
                    <label for="password">Contraseña</label> <input class="form-styling" type="password" name="password"
                        placeholder="" /> <label for="confirmpassword">Confirmar contraseña</label> <input
                        class="form-styling" type="password" name="confirmpassword" placeholder="" /> <a
                        ng-click="checked = !checked" class="btn-signup">Registrarse</a>
                        <?php  if (isset($error)): echo '<script type="text/javascript">', 'errorLogin();', '</script>'; ?>

    <div class="alert alert-danger alert-autocloseable-danger">I'm an autocloseable danger message. I will hide in 5 seconds. </div>
    
    <?= $error ; ?>


<?php endif ; ?>
                </form>
            
            </div>
            <div class="forgot"> <a href="#">¿Has olvidado tu contraseña?</a> </div>
</body>

</html>