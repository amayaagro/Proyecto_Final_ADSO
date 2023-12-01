<!-- SQL Crear Lote -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM cultivo");
$sentencia->execute();
$cultivos = $sentencia->fetchall(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM finca WHERE Estado = 1");
$sentencia->execute();
$fincas = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_POST) {
    $nombrelote = (isset($_POST['nombrelote']) ? $_POST['nombrelote'] : "");
    $finca = (isset($_POST['finca']) ? $_POST['finca'] : "");
    $cultivo = (isset($_POST['cultivo']) ? $_POST['cultivo'] : "");
    $tamaño = (isset($_POST['tamaño']) ? $_POST['tamaño'] : "");
    $fechadesiembra = (isset($_POST['fechadesiembra']) ? $_POST['fechadesiembra'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `lote` (`Id`, `NombreLote`, `FincaAsociada`, `Cultivo`, `Tamano`, `FechaDeSiembra`, `Estado`) 
        VALUES (NULL, :NombreLote, :FincaAsociada, :Cultivo, :Tamano, :FechaDeSiembra, :Estado)");
    $sentencia->bindParam(":NombreLote", $nombrelote);
    $sentencia->bindParam(":FincaAsociada", $finca);
    $sentencia->bindParam(":Cultivo", $cultivo);
    $sentencia->bindParam(":FechaDeSiembra", $fechadesiembra);
    $sentencia->bindParam(":Tamano", $tamaño);
    $sentencia->bindParam(":Estado", $estado);

    $sentencia->execute();
    $mensaje = "Registro creado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Crear Lote -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Lote</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombrelote" class="form-label">Nombre Lote</label>
                    <input type="text" class="form-control" name="nombrelote" id="nombrelote" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el nombre del lote">
                </div>
                <div class="mb-3">
                    <label for="finca" class="form-label">Finca Asociada</label>
                    <select class="form-select form-select-sm" name="finca" id="finca">
                        <?php foreach ($fincas as $finca) { ?>
                        <option value="<?php echo $finca['id']; ?>"><?php echo $finca['Nombredelpredio']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cultivo" class="form-label">Cultivo</label>
                    <select class="form-select form-select-sm" name="cultivo" id="cultivo">
                        <?php foreach ($cultivos as $sembradio) { ?>
                        <option value="<?php echo $sembradio['Id']; ?>"><?php echo $sembradio['Cultivo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño (Ha)</label>
                    <input type="number" class="form-control" name="tamaño" id="tamaño" value="" required
                        aria-describedby="helpId" placeholder="Ingrese el tamaño del lote">
                </div>
                <div class="mb-3">
                    <label for="fechadesiembra" class="form-label">Fecha de Siembra</label>
                    <input type="date" class="form-control" name="fechadesiembra" id="fechadesiembra" value="" required
                        aria-describedby="helpId" placeholder="">
                </div>
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