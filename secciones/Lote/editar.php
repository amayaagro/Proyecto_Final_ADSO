<!-- Página Editar Lote -->

<!-- SQL Editar Lote -->
<?php
include "../../bd.php";

$sentencia = $conexion->prepare("SELECT * FROM cultivo");
$sentencia->execute();
$cultivos = $sentencia->fetchall(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM finca WHERE Estado = 1");
$sentencia->execute();
$fincas = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM lote WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $lote = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombredelote = $lote['NombreLote'];
    $FincaAsociada = $lote['FincaAsociada'];
    $Cultivo = $lote['Cultivo'];
    $Tamano = $lote['Tamano'];
    $FechaDeSiembra = $lote['FechaDeSiembra'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $nombrelote = (isset($_POST['nombrelote']) ? $_POST['nombrelote'] : "");
    $finca = (isset($_POST['finca']) ? $_POST['finca'] : "");
    $cultivo = (isset($_POST['cultivo']) ? $_POST['cultivo'] : "");
    $tamaño = (isset($_POST['tamaño']) ? $_POST['tamaño'] : "");
    $fechadesiembra = (isset($_POST['fechadesiembra']) ? $_POST['fechadesiembra'] : "");

    $sentencia = $conexion->prepare("UPDATE lote SET
                                    NombreLote = :NombreLote, 
                                    FincaAsociada = :FincaAsociada,
                                    Cultivo = :Cultivo, 
                                    Tamano = :Tamano,
                                    FechaDeSiembra = :FechaDeSiembra
                                    WHERE Id = :Id
        ");

    $sentencia->bindParam(":NombreLote", $nombrelote);
    $sentencia->bindParam(":FincaAsociada", $finca);
    $sentencia->bindParam(":Cultivo", $cultivo);
    $sentencia->bindParam(":Tamano", $tamaño);
    $sentencia->bindParam(":FechaDeSiembra", $fechadesiembra);
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include "../../templates/header.php"; ?>

<br />
<!-- Formulario Editar Lote -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Datos Lote</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId"
                        id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="nombrelote" class="form-label">Nombre Lote</label>
                    <input type="text" value="<?php echo $nombredelote; ?>" class="form-control" name="nombrelote"
                        id="nombrelote" aria-describedby="helpId" placeholder="Ingrese el nombre del lote">
                </div>
                <div class="mb-3">
                    <label for="finca" class="form-label">Finca Asociada</label>
                    <select class="form-select form-select-sm" name="finca" id="finca">
                        <?php foreach ($fincas as $finca) { ?>
                        <option <?php echo ($FincaAsociada == $finca['id']) ? "selected" : ""; ?>
                            value="<?php echo $finca['id']; ?>">
                            <?php echo $finca['Nombredelpredio']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cultivo" class="form-label">Cultivo</label>
                    <select class="form-select form-select-sm" name="cultivo" id="cultivo">
                        <?php foreach ($cultivos as $siembra) { ?>
                        <option <?php echo ($Cultivo == $siembra['Id']) ? "selected" : ""; ?>
                            value="<?php echo $siembra['Id']; ?>">
                            <?php echo $siembra['Cultivo']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño (Ha)</label>
                    <input type="number" value="<?php echo $Tamano; ?>" class="form-control" name="tamaño" id="tamaño"
                        aria-describedby="helpId" placeholder="Ingrese el tamaño del lote">
                </div>
                <div class="mb-3">
                    <label for="fechadesiembra" class="form-label">Fecha de Siembra</label>
                    <input type="date" value="<?php echo $FechaDeSiembra; ?>" class="form-control" name="fechadesiembra"
                        id="fechadesiembra" aria-describedby="helpId" placeholder="">
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
<?php include "../../templates/footer.php"; ?>

<!-- Social footer -->
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