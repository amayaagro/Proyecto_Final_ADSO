<!-- SQL Insumos -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM `inventario`");
$sentencia->execute();
$inventario = $sentencia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM inventario WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $insumo = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($insumo['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE inventario SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE inventario SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    }

    $mensaje = "Estado Actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<!-- Herramienta de Accesibilidad -->
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
<!-- Contenedor Datos Insumos -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Insumos</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Fecha Inventario</th>
                            <th scope="col">Nombre del Insumo</th>
                            <th scope="col">Ingrediente Activo</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha de Compra</th>
                            <th scope="col">Fecha de Vencimiento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <div> <a href="../../secciones/Inventario/reportePDF.php"><img src="../../Img/ImpresoraPDF.png" width="70" height="60" align="right" title="Exportar a PDF" href=""></a>
                    </div>
                    <tbody>
                        <?php foreach ($inventario as $insumos) { ?>
                            <tr class="">
                                <td><?php echo $insumos['FechaInventario']; ?></td>
                                <td><?php echo $insumos['NombreInsumo']; ?></td>
                                <td><?php echo $insumos['IngredienteActivo']; ?></td>
                                <td><?php echo $insumos['Unidad']; ?></td>
                                <td><?php echo $insumos['CantidadEnBodega']; ?></td>
                                <td><?php echo $insumos['FechaDeCompra']; ?></td>
                                <td><?php echo $insumos['FechaDeVencimiento']; ?></td>
                                <?php if ($insumos['Estado'] == 1) { ?>
                                    <td>Activo</td>
                                <?php } ?>
                                <?php if ($insumos['Estado'] == 0) { ?>
                                    <td>Inactivo</td>
                                <?php } ?>
                                <td> <a id="editar" class="btn" title="Editar" href="editar.php?txtID=<?php echo $insumos['Id']; ?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" title="Borrar" href="javascript:borrar(<?php echo $insumos['Id']; ?>);" role="button">Estado</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../../templates/footer.php"); ?>

<!-- Social Footer -->
<?php include("../../templates/socfooter.php"); ?>