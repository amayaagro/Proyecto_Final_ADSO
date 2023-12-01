<!-- SQL Inicio Sesión -->
<?php
session_start();
if ($_POST) {
    include("bd.php");
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
    $password = (isset($_POST['password']) ? $_POST['password'] : "");

    $sentecia = $conexion->prepare("SELECT * FROM usuarios
        WHERE Correo = :Correo and Password = :Password");
    $sentecia->bindParam(":Correo", $correo);
    $sentecia->bindParam(":Password", $password);
    $sentecia->execute();
    $usuariovalidado = $sentecia->fetch(PDO::FETCH_LAZY);


    if ($usuariovalidado != null) {
        if ($usuariovalidado['Estado'] == 1) {
            $_SESSION['usuario'] = $usuariovalidado['Usuario'];
            $_SESSION['usuarioid'] = $usuariovalidado['Id'];
            $_SESSION['correo'] = $usuariovalidado['Correo'];
            $_SESSION['logueado'] = true;
            header("Location:index.php");
        } else {
            $mensaje = "el estado de este usuario se encuentra inactivo";
        }
    } else {
        $mensaje = "error el usuario o contraseña son incorrectos";
    }
}

?>

<!-- Página Inicio de Sesión -->
<!doctype html>
<html lang="en">

<head>
    <title>Inicio de Sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/login.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="quitar()">
    <header>
        <footer class="text-left text-black fixed-bottom">
            <!-- Copyright -->
            <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2)">
                <h7>Copyright © Kahwasoft 2023 - Todos los derechos reservados</h7>
            </div>
            <!-- Copyright -->
        </footer>
    </header>

    <!-- Formulario Inicio de Sesión -->
    <main class="container">
        <br /><br />
        <div class="row">
            <div class="col-md-5">

            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="content">
                        <div class="title">
                            <center>
                                <h3 id="Titulo"><strong>Inicio de Sesión</strong></h3>
                            </center>
                        </div>
                        <br>
                        <div class="card-body">
                            <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje ?></strong>
                            </div>
                            <?php } ?>
                            <?php

                            if (isset($_REQUEST['mensaje'])) { ?>
                            <div class="alert alert-success" id="alert-success" role="alert">
                                <strong><?php echo $_REQUEST['mensaje'] ?></strong>
                            </div>
                            <?php } ?>
                            <form action="" method="post">
                                <p><img src="img/logo.png" width="100%" Background-color="transparent"></p>
                                <div class="mb-3">
                                    <label for="correo" class="form-label">
                                        <h5>Correo Electrónico</h5>
                                    </label>
                                    <input type="email" value="<?php if (isset($correo)) echo $correo ?>"
                                        class="form-control" name="correo" id="correo" title="Correo"
                                        aria-describedby="helpId" placeholder="Ingrese su correo electrónico">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <h5>Contraseña</h5>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        title="Contraseña" aria-describedby="helpId" placeholder="Escriba Su Password">
                                </div>
                                <br>
                                <br>
                                <center><button type="submit" title="Ingresar al Sistema"
                                        class="btn btn-primary">Ingresar al sistema</button></center>
                                <br />
                                <div>
                                    <div align="left"><a href="recuperar.php" title="Olvidó su contraseña"
                                            style="color:#000000"><strong>¿Olvidó su contraseña?</strong></a></div>
                                    <p></p>
                                </div>
                            </form>
                            <p>¿No tienes cuenta aún? <a href="registrar.php" title="Regístrate acá"
                                    style="color:#000000"><strong>Regístrate acá</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script>
    function quitar() {
        setTimeout(function() {
            document.getElementById('alert-success').style.display = "none";
        }, 5000);

    }
    </script>
</body>

</html>

<!-- Herramienta de Accesibilidad -->
<script>
(function(d) {
    var s = d.createElement("script");
    s.setAttribute("data-account", "fFgZ6B1nWP");
    s.setAttribute("src", "https://cdn.userway.org/widget.js");
    s.setAttribute('locale', 'es');
    (d.body || d.head).appendChild(s);
})(document)
</script>