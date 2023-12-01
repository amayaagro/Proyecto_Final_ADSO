<!-- Página Asignar Labor -->

<!-- SQL Asignar Labor -->
<?php
include "../../bd.php";


$sentencia = $conexion->prepare("SELECT *, (SELECT Nombre FROM trabajadores where trabajadores.Id = plantillalabores.Encargado) as empleado,
	(SELECT Nombredelpredio FROM finca where finca.id = plantillalabores.Finca) as FincaDeTrabajo,
	(SELECT NombreLote FROM lote where lote.Id = plantillalabores.Lote) as LoteDeTrabajo,
	(SELECT labor FROM labores WHERE labores.Id = plantillalabores.Labor) as LaborDeTrabajo
    FROM plantillalabores");
$sentencia->execute();
$asignaciondetareas = $sentencia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM plantillalabores WHERE Id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $tarea = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($tarea['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE plantillalabores SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE plantillalabores SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    }

    $mensaje = "Estado Actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>

<!-- Header -->
<?php include "../../templates/header.php"; ?>

<br />
<!-- Contenedor Datos Laboress -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Asignación de Labores</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Finca</th>
                            <th scope="col">Lote</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">Labor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <div> <a href="../../secciones/PlantillaDeTareas/reportePDF.php"><img src="../../Img/ImpresoraPDF.png" width="70" height="60" align="right" title="Exportar a PDF" href=""></a>
                    </div>
                    <tbody>
                        <?php foreach ($asignaciondetareas as $tarea) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $tarea['FechaDeAsignacion']; ?></td>
                                <td scope="row"><?php echo $tarea['FincaDeTrabajo']; ?></td>
                                <td scope="row"><?php echo $tarea['LoteDeTrabajo']; ?></td>
                                <td scope="row"><?php echo $tarea['empleado']; ?></td>
                                <td scope="row"><?php echo $tarea['LaborDeTrabajo']; ?></td>
                                <?php if ($tarea['Estado'] == 1) { ?>
                                    <td>Activo</td>
                                <?php } ?>
                                <?php if ($tarea['Estado'] == 0) { ?>
                                    <td>Inactivo</td>
                                <?php } ?>
                                <td> <a id="editar" class="btn" title="Editar" href="editar.php?txtID=<?php echo $tarea['Id']; ?>" role="button">Editar</a>
                                    <a id="borrar" class="btn" title="Estado" href="javascript:borrar(<?php echo $tarea['Id']; ?>);" role="button">Estado</a>
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
<?php include "../../templates/footer.php"; ?>

<!-- Social Footer -->
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