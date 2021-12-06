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
                <form class="form-signin" action="" method="post" name="form"> <label for="username">Usuario</label>
                    <input class="form-styling" type="text" name="username" placeholder="" /> <label
                        for="password">Contraseña</label> <input class="form-styling" type="password" name="password"
                        placeholder="" /> <input type="checkbox" id="checkbox" /> <label for="checkbox"><span
                            class="ui"></span>Mantener sesión iniciada</label>
                    <div class="btn-animate"> <a href="./paginas/admin.php" class="btn-signin">Entrar</a> </div>
                </form>
                <form class="form-signup" action="" method="post" name="form">
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
                </form>
                <div class="success">
                    <svg width="270" height="270" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" id="check"
                        ng-class="checked ? 'checked' : ''"></svg>
                    <path fill="#ffffff"
                        d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314 c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042 c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578" />
                    <div class="successtext">
                        <p> Thanks for signing up! Check your email for confirmation.</p>
                    </div>
                </div>
            </div>
            <div class="forgot"> <a href="#">¿Has olvidado tu contraseña?</a> </div>
</body>

</html>