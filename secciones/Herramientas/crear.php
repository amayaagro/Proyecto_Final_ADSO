<!-- SQL Crear Herramienta -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);


if ($_POST) {
    $fechadeinventario = (isset($_POST['fechadeinventario']) ? $_POST['fechadeinventario'] : "");
    $nombreherramienta = (isset($_POST['nombreherramienta']) ? $_POST['nombreherramienta'] : "");
    $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : "");
    $fechadeentrega = (isset($_POST['fechadeentrega']) ? $_POST['fechadeentrega'] : "");
    $fechaderecibido = (isset($_POST['fechaderecibido']) ? $_POST['fechaderecibido'] : "");
    $responsable = (isset($_POST['responsable']) ? $_POST['responsable'] : "");
    $fechadereemplazo = (isset($_POST['fechadereemplazo']) ? $_POST['fechadereemplazo'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `herramientas` (`Id`, `FechaInventario`, `NombreHerramienta`, `Cantidad`, `FechaDeEntrega`, `FechaDeRecibido`, `Responsable`, `FechaDeReemplazo`, `Estado`) 
        VALUES (NULL, :FechaInventario, :NombreHerramienta,:Cantidad,:FechaDeEntrega,
        :FechaDeRecibido,:Responsable,:FechaDeReemplazo,:Estado);");
    $sentencia->bindParam(":FechaInventario", $fechadeinventario);
    $sentencia->bindParam(":NombreHerramienta", $nombreherramienta);
    $sentencia->bindParam(":Cantidad", $cantidad);
    $sentencia->bindParam(":FechaDeEntrega", $fechadeentrega);
    $sentencia->bindParam(":FechaDeRecibido", $fechaderecibido);
    $sentencia->bindParam(":Responsable", $responsable);
    $sentencia->bindParam(":FechaDeReemplazo", $fechadereemplazo);
    $sentencia->bindParam(":Estado", $estado);
    $sentencia->execute();
    $mensaje = "Registro creado";
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
<!-- Formulario Crear Herramienta -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Herramienta</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fechadeinventario" class="form-label">Fecha de Inventario</label>
                    <input type="date" class="form-control" name="fechadeinventario" id="fechadeinventario" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="nombreherramienta" class="form-label">Nombre de La Herramienta</label>
                    <input type="text" class="form-control" name="nombreherramienta" id="nombreherramienta" value="" required aria-describedby="helpId" placeholder="Ingrese el nombre de la herramienta">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="" required aria-describedby="helpId" placeholder="Ingrese la cantidad">
                </div>
                <div class="mb-3">
                    <label for="fechadeentrega" class="form-label">Fecha de Entrega</label>
                    <input type="date" class="form-control" name="fechadeentrega" id="fechadeentrega" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fechaderecibido" class="form-label">Fecha de Recibido</label>
                    <input type="date" class="form-control" name="fechaderecibido" id="fechaderecibido" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <select class="form-select form-select-sm" name="responsable" id="responsable">
                        <?php foreach ($empleados as $empleado) { ?>
                            <option value="<?php echo $empleado['Id']; ?>"><?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="fechadereemplazo" class="form-label">Fecha de Reemplazo</label>
                    <input type="date" class="form-control" name="fechadereemplazo" id="fechadereemplazo" aria-describedby="helpId" placeholder="">
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