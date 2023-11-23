<!-- SQL Editar Herramienta -->
<?php
include("../../bd.php");

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM inventario WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $insumo = $sentencia->fetch(PDO::FETCH_LAZY);

    $fechadeinventario = $insumo['FechaInventario'];
    $nombreinsumo = $insumo['NombreInsumo'];
    $ingredienteactivo = $insumo['IngredienteActivo'];
    $unidad = $insumo['Unidad'];
    $cantidadenbodega = $insumo['CantidadEnBodega'];
    $fechadecompra = $insumo['FechaDeCompra'];
    $fechadevencimiento = $insumo['FechaDeVencimiento'];
    $estado = $insumo['Estado'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $fechadeinventario = (isset($_POST['fechadeinventario']) ? $_POST['fechadeinventario'] : "");
    $nombreinsumo = (isset($_POST['nombreinsumo']) ? $_POST['nombreinsumo'] : "");
    $ingredienteactivo = (isset($_POST['ingredienteactivo']) ? $_POST['ingredienteactivo'] : "");
    $unidad = (isset($_POST['unidad']) ? $_POST['unidad'] : "");
    $cantidadenbodega = (isset($_POST['cantidadenbodega']) ? $_POST['cantidadenbodega'] : "");
    $fechadecompra = (isset($_POST['fechadecompra']) ? $_POST['fechadecompra'] : "");
    $fechadevencimiento = (isset($_POST['fechadevencimiento']) ? $_POST['fechadevencimiento'] : "");

    $sentencia = $conexion->prepare("UPDATE inventario SET 
                                        FechaInventario = :fechadeinventario,
                                        NombreInsumo = :nombreinsumo,
                                        IngredienteActivo = :ingredienteactivo,
                                        Unidad = :unidad,
                                        CantidadEnBodega = :cantidadenbodega,
                                        FechaDeCompra = :fechadecompra,
                                        FechaDeVencimiento = :fechadevencimiento
                                        WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->bindParam(":fechadeinventario", $fechadeinventario);
    $sentencia->bindParam(":nombreinsumo", $nombreinsumo);
    $sentencia->bindParam(":ingredienteactivo", $ingredienteactivo);
    $sentencia->bindParam(":unidad", $unidad);
    $sentencia->bindParam(":cantidadenbodega", $cantidadenbodega);
    $sentencia->bindParam(":fechadecompra", $fechadecompra);
    $sentencia->bindParam(":fechadevencimiento", $fechadevencimiento);
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
<!-- Formulario Editar Insumo -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Insumo</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="fechadeinventario" class="form-label">Fecha de Inventario</label>
                    <input type="date" value="<?php echo $fechadeinventario; ?>" class="form-control" name="fechadeinventario" id="fechadeinventario" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="nombreinsumo" class="form-label">Nombre del Insumo</label>
                    <input type="text" value="<?php echo $nombreinsumo; ?>" class="form-control" name="nombreinsumo" id="nombreinsumo" aria-describedby="helpId" placeholder="Ingrese el nombre del insumo">
                </div>
                <div class="mb-3">
                    <label for="ingredienteactivo" class="form-label">Ingrediente Activo</label>
                    <input type="text" value="<?php echo $ingredienteactivo; ?>" class="form-control" name="ingredienteactivo" id="ingredienteactivo" aria-describedby="helpId" placeholder="Ingrese el ingrediente activo">
                </div>
                <div class="mb-3">
                    <label for="unidad" class="form-label">Unidad</label>
                    <input type="text" v value="<?php echo $unidad; ?>" class="form-control" name="unidad" id="unidad" aria-describedby="helpId" placeholder="Ingrese la unidad">
                </div>
                <div class="mb-3">
                    <label for="cantidadenbodega" class="form-label">Cantidad</label>
                    <input type="number" value="<?php echo $cantidadenbodega; ?>" class="form-control" name="cantidadenbodega" id="cantidadenbodega" aria-describedby="helpId" placeholder="cantidad en bodega">
                </div>
                <div class="mb-3">
                    <label for="fechadecompra" class="form-label">Fecha de Compra</label>
                    <input type="date" value="<?php echo $fechadecompra; ?>" class="form-control" name="fechadecompra" id="fechadecompra" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="fechadevencimiento" class="form-label">Fecha de Vencimiento</label>
                    <input type="date" value="<?php echo $fechadevencimiento; ?>" class="form-control" name="fechadevencimiento" id="fechadevencimiento" aria-describedby="helpId" placeholder="">
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