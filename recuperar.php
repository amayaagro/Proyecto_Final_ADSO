<?php require("bd.php"); ?>

<!-- Página Registrar Usuario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/recup.css" />
    </script>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
</head>

<body>
    <!--Formulario registro-->
    <div class="content-r">
        <div class="title">
            <h2 align=left>Recuperar Contraseña<img src="/../kahwa/Img/Logo.png" width="230" height="80" align="right">
            </h2>
            <h3 align=left><label for="username">Por favor, ingrese su correo electrónico</label></h3>
            <p><br></p>
            <?php echo !empty($statusMsg) ? '<p class="' . $statusMsgType . '">' . $statusMsg . '</p>' : ''; ?>
            <div class="mb-3">

                <form action="secciones/Contraseña/resetearClave.php" method="post">
                    <input type="email" value="" class="form-control" name="correo" id="correo" value="" required
                        aria-describedby="helpId" placeholder="Ingrese su correo electrónico">
                    </br>
                    <button type="submit" id="guardar" title="Aceptar" class="btn">Aceptar</button>
                    &nbsp&nbsp
                    <a name="" id="cancelar" class="btn" title="Cancelar" href="index.php" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<!-- Footer -->
<?php include("templates/footer.php"); ?>

<!-- Herramienta Accesibilidad -->
<script>
(function(d) {
    var s = d.createElement("script");
    s.setAttribute("data-account", "fFgZ6B1nWP");
    s.setAttribute("src", "https://cdn.userway.org/widget.js");
    s.setAttribute('locale', 'es');
    (d.body || d.head).appendChild(s);
})(document)
</script>