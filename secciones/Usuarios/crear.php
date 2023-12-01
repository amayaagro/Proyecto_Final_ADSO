<!-- SQL Crear Finca -->
<?php
include("../../bd.php");

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
    $mensaje = "Registro creado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>
<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br>
<!-- Formulario Crear Usuario -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Crear Usuario</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre">
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
                <a name="" id="cancelar" class="btn" href="index.php" title="Cancelar" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../../templates/footer.php"); ?>

<!-- Social Footer -->
<?php include("../../templates/socfooter.php"); ?>

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