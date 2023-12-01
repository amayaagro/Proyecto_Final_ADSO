<!-- Página Crear Asignar Labor -->

<!-- SQL Crear Asignar Labor -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM finca WHERE Estado = 1");
$sentencia->execute();
$fincas = $sentencia->fetchall(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM lote WHERE Estado = 1");
$sentencia->execute();
$lotes = $sentencia->fetchall(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM labores");
$sentencia->execute();
$labores = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_POST) {
    $fechadeasignacion = (isset($_POST['fechadeasignacion']) ? $_POST['fechadeasignacion'] : "");
    $encargado = (isset($_POST['encargado']) ? $_POST['encargado'] : "");
    $finca = (isset($_POST['finca']) ? $_POST['finca'] : "");
    $lote = (isset($_POST['lote']) ? $_POST['lote'] : "");
    $labor = (isset($_POST['labor']) ? $_POST['labor'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `plantillalabores` (`Id`, `FechaDeAsignacion`, `Encargado`, `Finca`, `Lote`, `Labor`, `Estado`) 
        VALUES (NULL, :FechaDeAsignacion, :Encargado, :Finca, :Lote, :Labor, :Estado)");

    $sentencia->bindParam(":FechaDeAsignacion", $fechadeasignacion);
    $sentencia->bindParam(":Encargado", $encargado);
    $sentencia->bindParam(":Finca", $finca);
    $sentencia->bindParam(":Lote", $lote);
    $sentencia->bindParam(":Labor", $labor);
    $sentencia->bindParam(":Estado", $estado);
    $sentencia->execute();
    $mensaje = "Registro creado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Crear Asignar Labor -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Labor</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fechadeasignacion" class="form-label">Fecha de Asignación</label>
                    <input type="date" class="form-control" name="fechadeasignacion" id="fechadeasignacion" value=""
                        required aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="encargado" class="form-label">Encargado</label>
                    <select class="form-select form-select-sm" name="encargado" id="encargado">
                        <?php foreach ($empleados as $empleado) { ?>
                        <option value="<?php echo $empleado['Id']; ?>"><?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="finca" class="form-label">Finca</label>
                    <select class="form-select form-select-sm" name="finca" id="finca">
                        <?php foreach ($fincas as $finca) { ?>
                        <option value="<?php echo $finca['id']; ?>"><?php echo $finca['Nombredelpredio']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lote" class="form-label">Lote</label>
                    <select class="form-select form-select-sm" name="lote" id="lote">
                        <?php foreach ($lotes as $lote) { ?>
                        <option value="<?php echo $lote['Id']; ?>"><?php echo $lote['NombreLote']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="labor" class="form-label">Labor</label>
                    <select class="form-select form-select-sm" name="labor" id="labor">
                        <?php foreach ($labores as $labor) { ?>
                        <option value="<?php echo $labor['Id']; ?>"><?php echo $labor['labor']; ?></option>
                        <?php } ?>
                    </select>
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