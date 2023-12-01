<!-- SQL Recolección -->
<?php
include("../../bd.php");

$sentecia = $conexion->prepare("SELECT *, (SELECT Nombre FROM trabajadores where trabajadores.Id = planilladerecoleccion.Responsable) as empleado
    FROM planilladerecoleccion");
$sentecia->execute();
$recoleccion = $sentecia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM planilladerecoleccion WHERE Id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $recoleccion = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($recoleccion['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE planilladerecoleccion SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE planilladerecoleccion SET Estado = :Estado Where Id = :Id");
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

<br />
<!-- Contenedor Datos Planilla de Recolección -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Planilla de Recolección</strong><img src="../../Img/Logo.png" width="230"
                    height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Fecha de Recolección</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Kilos Recolectados</th>
                            <th scope="col">Jornales Empleados</th>
                            <th scope="col">Valor Neto</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <div> <a href="../../secciones/PlantillaDeRecoleccion/reportePDF.php"><img
                                src="../../Img/ImpresoraPDF.png" width="70" height="60" align="right"
                                title="Exportar a PDF" href=""></a>
                    </div>
                    <tbody>
                        <?php foreach ($recoleccion as $recolector) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $recolector['FechaDeRecoleccion']; ?></td>
                            <td scope="row"><?php echo $recolector['empleado']; ?></td>
                            <td scope="row"><?php echo $recolector['KilosRecolectados']; ?></td>
                            <td scope="row"><?php echo $recolector['JornalesRecoleccion']; ?></td>
                            <td scope="row">$ <?php echo $recolector['ValorNeto']; ?></td>
                            <td scope="row">$ <?php echo $recolector['Descuentos']; ?></td>
                            <td scope="row">$ <?php echo $recolector['Total']; ?></td>
                            <?php if ($recolector['Estado'] == 1) { ?>
                            <td>Activo</td>
                            <?php } ?>
                            <?php if ($recolector['Estado'] == 0) { ?>
                            <td>Inactivo</td>
                            <?php } ?>
                            <td><a id="editar" class="btn" title="Editar"
                                    href="editar.php?txtID=<?php echo $recolector['Id']; ?>" role="button">Editar</a>
                                <a id="borrar" class="btn" title="Estado"
                                    href="javascript:borrar(<?php echo $recolector['Id']; ?>);" role="button">Estado</a>
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
<?php include("../../templates/footer.php"); ?>.

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