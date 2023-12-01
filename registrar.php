<!-- SQL Registro Usuario -->
<?php
include("bd.php");

if ($_POST) {
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
    $nombredeusuario = (isset($_POST['nombreusuario']) ? $_POST['nombreusuario'] : "");
    $contraseña = (isset($_POST['contraseña']) ? $_POST['contraseña'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`Id`, `Nombre`, `Correo`, `Usuario`, `Password`, `Estado`) VALUES 
        (NULL, :nombre, :correo, :nombredeusuario, :password, :estado)");
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":nombredeusuario", $nombredeusuario);
    $sentencia->bindParam(":password", $contraseña);
    $sentencia->bindParam(":estado", $estado);
    $sentencia->execute();

    if ($sentencia->rowCount() > 0) {
        $mensaje = "Se ha creado el usuario.";
        header("Location:login.php?mensaje=" . $mensaje);
    } else {
        $statusMsg = "usuario incorrecto";
    }
}
?>

<!-- Página Registrar Usuario -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro Nuevo Usuario</title>
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/creau.css" />
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
            <h3 align=left>Nuevo Usuario<img src="/../kahwa/Img/Logo.png" width="230" height="80" align="right"></h3>
            <br>
            <p><br></p>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre">
                </div>
                <div class="valid-feedback">
                    !Se ve bien!
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" name="correo" id="correo" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el correo">
                </div>
                <div class="mb-3">
                    <label for="nombreusuario" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" name="nombreusuario" id="nombreusuario" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre de usuario">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" id="contraseña" value="" required
                        aria-describedby="helpId" placeholder="Ingrese la contraseña">
                </div>
                </br>
                <button type="submit" id="guardar" title="Agregar" class="btn">Agregar</button>
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