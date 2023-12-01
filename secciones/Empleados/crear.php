<!-- SQL Crear Trabajador -->
<?php
include("../../bd.php");

if ($_POST) {
    $documento = (isset($_POST['documento']) ? $_POST['documento'] : "");
    $nombrecompleto = (isset($_POST['nombrecompleto']) ? $_POST['nombrecompleto'] : "");
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
    $fechadenacimiento = (isset($_POST['fechadenacimiento']) ? $_POST['fechadenacimiento'] : "");
    $eps = (isset($_POST['eps']) ? $_POST['eps'] : "");
    $arl = (isset($_POST['arl']) ? $_POST['arl'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");
    $sentencia = $conexion->prepare("INSERT INTO `trabajadores` (`Id`, `Documento`, `Nombre`, `Telefono`, `FechaDeNacimiento`, `Eps`, `Arl`, `Estado`) VALUES 
        (NULL, :documento, :nombrecompleto, :telefono, :fechadenacimiento, :eps, :arl, :estado)");
    $sentencia->bindParam(":documento", $documento);
    $sentencia->bindParam(":nombrecompleto", $nombrecompleto);
    $sentencia->bindParam(":telefono", $telefono);
    $sentencia->bindParam(":fechadenacimiento", $fechadenacimiento);
    $sentencia->bindParam(":eps", $eps);
    $sentencia->bindParam(":arl", $arl);
    $sentencia->bindParam(":estado", $estado);
    $sentencia->execute();
    $mensaje = "Registro creado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>
<?php include("../../templates/header.php"); ?>

<br />

<!-- Formulario Crear Trabajador -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Trabajador</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="documento" class="form-label">Documento</label>
                    <input type="number" class="form-control" name="documento" id="documento" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el documento">
                </div>
                <div class="mb-3">
                    <label for="nombrecompleto" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre completo">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el telefono">
                </div>
                <div class="mb-3">
                    <label for="fechadenacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechadenacimiento" id="fechadenacimiento"
                        aria-describedby="helpId" placeholder="Ingrese la fecha de nacimiento">
                </div>
                <div class="mb-3">
                    <label for="eps" class="form-label">EPS</label>
                    <input type="text" class="form-control" name="eps" id="eps" value="" required
                        aria-describedby="helpId" placeholder="Ingrese la eps">
                </div>
                <div class="mb-3">
                    <label for="arl" class="form-label">ARL</label>
                    <input type="text" class="form-control" name="arl" id="arl" aria-describedby="helpId"
                        placeholder="Ingrese la arl">
                </div>
                </br>
                <button type="submit" id="guardar" class="btn" title="Agregar">Agregar</button>
                &nbsp&nbsp
                <a name="" id="cancelar" class="btn" href="index.php" role="button" title="Cancelar">Cancelar</a>
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