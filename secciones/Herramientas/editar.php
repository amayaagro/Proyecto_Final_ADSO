<!-- SQL Editar Herramienta -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM herramientas WHERE Id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $herramienta = $sentencia->fetch(PDO::FETCH_LAZY);

    $FechaInventario = $herramienta['FechaInventario'];
    $NombreHerramienta = $herramienta['NombreHerramienta'];
    $Cantidad = $herramienta['Cantidad'];
    $FechaDeEntrega = $herramienta['FechaDeEntrega'];
    $FechaDeRecibido = $herramienta['FechaDeRecibido'];
    $Responsable = $herramienta['Responsable'];
    $FechaDeReemplazo = $herramienta['FechaDeReemplazo'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $fechadeinventario = (isset($_POST['fechadeinventario']) ? $_POST['fechadeinventario'] : "");
    $nombreherramienta = (isset($_POST['nombreherramienta']) ? $_POST['nombreherramienta'] : "");
    $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : "");
    $fechadeentrega = (isset($_POST['fechadeentrega']) ? $_POST['fechadeentrega'] : "");
    $fechaderecibido = (isset($_POST['fechaderecibido']) ? $_POST['fechaderecibido'] : "");
    $responsable = (isset($_POST['responsable']) ? $_POST['responsable'] : "");
    $fechadereemplazo = (isset($_POST['fechadereemplazo']) ? $_POST['fechadereemplazo'] : "");

    $sentencia = $conexion->prepare("UPDATE herramientas SET 
        FechaInventario = :FechaInventario,
        NombreHerramienta = :NombreHerramienta, 
        Cantidad = :Cantidad,
        FechaDeEntrega = :FechaDeEntrega,
        FechaDeRecibido = :FechaDeRecibido,
        Responsable = :Responsable,
        FechaDeReemplazo = :FechaDeReemplazo
        WHERE Id = :Id");
    $sentencia->bindParam(":FechaInventario", $fechadeinventario);
    $sentencia->bindParam(":NombreHerramienta", $nombreherramienta);
    $sentencia->bindParam(":Cantidad", $cantidad);
    $sentencia->bindParam(":FechaDeEntrega", $fechadeentrega);
    $sentencia->bindParam(":FechaDeRecibido", $fechaderecibido);
    $sentencia->bindParam(":Responsable", $responsable);
    $sentencia->bindParam(":FechaDeReemplazo", $fechadereemplazo);
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Editar Herramienta -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Datos Herramienta</strong><img src="../../Img/Logo.png" width="230"
                    height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId"
                        id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="fechadeinventario" class="form-label">Fecha de Inventario</label>
                    <input type="date" value="<?php echo $FechaInventario; ?>" class="form-control"
                        name="fechadeinventario" id="fechadeinventario" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="nombreherramienta" class="form-label">Nombre de la Herramienta</label>
                    <input type="text" value="<?php echo $NombreHerramienta; ?>" class="form-control"
                        name="nombreherramienta" id="nombreherramienta" aria-describedby="helpId"
                        placeholder="Ingrese el nombre de la herramienta">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" value="<?php echo $Cantidad; ?>" class="form-control" name="cantidad"
                        id="cantidad" aria-describedby="helpId" placeholder="Ingrese la cantidad">
                </div>
                <div class="mb-3">
                    <label for="fechadeentrega" class="form-label">Fecha de Entrega</label>
                    <input type="date" value="<?php echo $FechaDeEntrega; ?>" class="form-control" name="fechadeentrega"
                        id="fechadeentrega" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fechaderecibido" class="form-label">Fecha de Recibido</label>
                    <input type="date" value="<?php echo $FechaDeRecibido; ?>" class="form-control"
                        name="fechaderecibido" id="fechaderecibido" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <select class="form-select form-select-sm" name="responsable" id="responsable">
                        <?php foreach ($empleados as $empleado) { ?>
                        <option <?php echo ($Responsable == $empleado['Id']) ? "selected" : ""; ?>
                            value="<?php echo $empleado['Id']; ?>">
                            <?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fechadereemplazo" class="form-label">Fecha de Reemplazo</label>
                    <input type="date" value="<?php echo $FechaDeReemplazo; ?>" class="form-control"
                        name="fechadereemplazo" id="fechadereemplazo" aria-describedby="helpId" placeholder="">
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