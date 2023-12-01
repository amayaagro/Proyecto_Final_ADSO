<!-- Página Crear Labor -->

<!-- SQL Crear Labor -->
<?php
include "../../bd.php";
if ($_POST) {
    $labor = (isset($_POST['labor']) ? $_POST['labor'] : "");
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");
    $sentencia = $conexion->prepare("INSERT INTO `labores` (`Id`, `labor`, `Descripcion`, `Estado`) VALUES 
        (NULL, :labor, :Descripcion, :estado)");
    $sentencia->bindParam(":labor", $labor);
    $sentencia->bindParam(":Descripcion", $descripcion);
    $sentencia->bindParam(":estado", $estado);
    $sentencia->execute();
    $mensaje = "Registro creado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include "../../templates/header.php"; ?>

<br />
<!-- Formulario Crear Labor -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Labor</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="labor" class="form-label">Labor</label>
                    <input type="text" class="form-control" name="labor" id="labor" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre de la labor">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="" required
                        aria-describedby="helpId" placeholder="Ingrese la descripción">
                </div>
                <button type="submit" id="guardar" class="btn" title="Agregar">Agregar</button>
                &nbsp&nbsp
                <a name="" id="cancelar" class="btn" href="index.php" role="button" title="Cancelar">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include "../../templates/footer.php"; ?>

<!-- Social Footer -->
<?php include "../../templates/socfooter.php"; ?>

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