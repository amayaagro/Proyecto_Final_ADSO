<!-- SQL Editar Herramienta -->
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

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM plantillalabores Where Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $tarea = $sentencia->fetch(PDO::FETCH_LAZY);

    $FechaDeAsignacion = $tarea['FechaDeAsignacion'];
    $Encargado = $tarea['Encargado'];
    $Finca = $tarea['Finca'];
    $Lote = $tarea['Lote'];
    $Labor = $tarea['Labor'];
}

if ($_POST) {
    $fechadeasignacion = (isset($_POST['fechadeasignacion']) ? $_POST['fechadeasignacion'] : "");
    $encargado = (isset($_POST['encargado']) ? $_POST['encargado'] : "");
    $finca = (isset($_POST['finca']) ? $_POST['finca'] : "");
    $lote = (isset($_POST['lote']) ? $_POST['lote'] : "");
    $labor = (isset($_POST['labor']) ? $_POST['labor'] : "");
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");

    $sentencia = $conexion->prepare("UPDATE plantillalabores SET 
        FechaDeAsignacion = :FechaDeAsignacion, 
        Encargado = :Encargado, 
        Finca = :Finca, 
        Lote = :Lote, 
        Labor = :Labor
        WHERE Id = :id");

    $sentencia->bindParam(":FechaDeAsignacion", $fechadeasignacion);
    $sentencia->bindParam(":Encargado", $encargado);
    $sentencia->bindParam(":Finca", $finca);
    $sentencia->bindParam(":Lote", $lote);
    $sentencia->bindParam(":Labor", $labor);
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

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

<br />
<!-- Formulario Editar Labores -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Labor Asignada</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="fechadeasignacion" class="form-label">Fecha de Asignación</label>
                    <input type="date" value="<?php echo $FechaDeAsignacion; ?>" class="form-control" name="fechadeasignacion" id="fechadeasignacion" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="encargado" class="form-label">Encargado</label>
                    <select class="form-select form-select-sm" name="encargado" id="encargado">
                        <?php foreach ($empleados as $empleado) { ?>
                            <option <?php echo ($Encargado == $empleado['Id']) ? "selected" : ""; ?> value="<?php echo $empleado['Id']; ?>">
                                <?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="finca" class="form-label">Finca</label>
                    <select class="form-select form-select-sm" name="finca" id="finca">
                        <?php foreach ($fincas as $finca) { ?>
                            <option <?php echo ($Finca == $finca['id']) ? "selected" : ""; ?> value="<?php echo $finca['id']; ?>">
                                <?php echo $finca['Nombredelpredio']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lote" class="form-label">Lote</label>
                    <select class="form-select form-select-sm" name="lote" id="lote">
                        <?php foreach ($lotes as $lote) { ?>
                            <option <?php echo ($Lote == $lote['Id']) ? "selected" : ""; ?> value="<?php echo $lote['Id']; ?>">
                                <?php echo $lote['NombreLote']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="labor" class="form-label">Labor</label>
                    <select class="form-select form-select-sm" name="labor" id="labor">
                        <?php foreach ($labores as $labor) { ?>
                            <option <?php echo ($Labor == $labor['Id']) ? "selected" : ""; ?> value="<?php echo $labor['Id']; ?>">
                                <?php echo $labor['labor']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                </br>
                <button type="submit" id="guardar" class="btn" title="Actualizar">Actualizar</button>
                &nbsp&nbsp
                <a name="" id="cancelar" class="btn" href="index.php" role="button" title="Cancelar">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../../templates/footer.php"); ?>

<!-- Social footer -->
<?php include("../../templates/socfooter.php"); ?>