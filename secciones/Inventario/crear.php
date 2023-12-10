<!-- Crear Insumo -->

<!-- SQL Crear Insumo -->
<?php
include("../../bd.php");

if ($_POST) {
    $nombreinsumo = (isset($_POST['nombreinsumo']) ? $_POST['nombreinsumo'] : "");
    $fechadeinventario = (isset($_POST['fechadeinventario']) ? $_POST['fechadeinventario'] : "");
    $ingredienteactivo = (isset($_POST['ingredienteactivo']) ? $_POST['ingredienteactivo'] : "");
    $unidad = (isset($_POST['unidad']) ? $_POST['unidad'] : "");
    $cantidadenbodega = (isset($_POST['cantidadenbodega']) ? $_POST['cantidadenbodega'] : "");
    $fechadecompra = (isset($_POST['fechadecompra']) ? $_POST['fechadecompra'] : "");
    $fechadevencimiento = (isset($_POST['fechadevencimiento']) ? $_POST['fechadevencimiento'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");
    $sentencia = $conexion->prepare("INSERT INTO `inventario` (`Id`, `FechaInventario`, `NombreInsumo`, `IngredienteActivo`, `Unidad`, `CantidadEnBodega`, `FechaDeCompra`, `FechaDeVencimiento` , `Estado`)
        VALUES (NULL, :fechadeinventario, :nombreinsumo, :ingredienteactivo, :unidad, :cantidadenbodega, :fechadecompra, :fechadevencimiento, :estado)");
    $sentencia->bindParam(":fechadeinventario", $fechadeinventario);
    $sentencia->bindParam(":nombreinsumo", $nombreinsumo);
    $sentencia->bindParam(":ingredienteactivo", $ingredienteactivo);
    $sentencia->bindParam(":unidad", $unidad);
    $sentencia->bindParam(":cantidadenbodega", $cantidadenbodega);
    $sentencia->bindParam(":fechadecompra", $fechadecompra);
    $sentencia->bindParam(":fechadevencimiento", $fechadevencimiento);
    $sentencia->bindParam(":estado", $estado);
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
<!-- Formulario Crear Insumo -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Insumo</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fechadeinventario" class="form-label">Fecha de Inventario</label>
                    <input type="date" class="form-control" name="fechadeinventario" id="fechadeinventario" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="nombreinsumo" class="form-label">Nombre del Insumo</label>
                    <input type="text" class="form-control" name="nombreinsumo" id="nombreinsumo" value="" required aria-describedby="helpId" placeholder="Ingrese el nombre del insumo">
                </div>
                <div class="mb-3">
                    <label for="ingredienteactivo" class="form-label">Ingrediente Activo</label>
                    <input type="text" class="form-control" name="ingredienteactivo" id="ingredienteactivo" value="" required aria-describedby="helpId" placeholder="Ingrese el ingrediente activo">
                </div>
                <div class="mb-3">
                    <label for="unidad" class="form-label">Unidad</label>
                    <input type="text" class="form-control" name="unidad" id="unidad" aria-describedby="helpId" value="" required placeholder="Ingrese la unidad">
                </div>
                <div class="mb-3">
                    <label for="cantidadenbodega" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" name="cantidadenbodega" id="cantidadenbodega" min="0" aria-describedby="helpId" placeholder="cantidad en bodega">
                </div>
                <div class="mb-3">
                    <label for="fechadecompra" class="form-label">Fecha de Compra</label>
                    <input type="date" class="form-control" name="fechadecompra" id="fechadecompra" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fechadevencimiento" class="form-label">Fecha de Vencimiento</label>
                    <input type="date" class="form-control" name="fechadevencimiento" id="fechadevencimiento" aria-describedby="helpId" placeholder="">
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