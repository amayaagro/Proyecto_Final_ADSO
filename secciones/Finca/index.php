<!-- SQL FincaHerramientas -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM `finca`");
$sentencia->execute();
$fincas = $sentencia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM finca WHERE id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $trabajador = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($trabajador['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE finca SET Estado = :Estado Where id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE finca SET Estado = :Estado Where id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    }

    $mensaje = "Estado Actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>
<?php include("../../templates/header.php"); ?>

<br />
<!-- Contenedor Datos Finca -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Fincas</strong><img src="../../Img/Logo.png" width="230" height="80" align="right">
            </h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Vereda</th>
                            <th scope="col">Municipio</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Tamaño (Ha)</th>
                            <th scope="col">T° (°C)</th>
                            <th scope="col">B.S. (%)</th>
                            <th scope="col">Lluvia (mm)</th>
                            <th scope="col">H.R. (%)</th>
                            <th scope="col">Relieve</th>
                            <th scope="col">Altura (m.s.n.m)</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fincas as $finca) { ?>
                        <tr class="">
                            <td><?php echo $finca['Nombredelpredio']; ?></td>
                            <td><?php echo $finca['Vereda']; ?></td>
                            <td><?php echo $finca['Municipio']; ?></td>
                            <td><?php echo $finca['Departamento']; ?></td>
                            <td><?php echo $finca['Tamano']; ?></td>
                            <td><?php echo $finca['Temperatura']; ?></td>
                            <td><?php echo $finca['BrilloSolar']; ?></td>
                            <td><?php echo $finca['Lluvia']; ?></td>
                            <td><?php echo $finca['HumedadRelativa']; ?></td>
                            <td><?php echo $finca['Relieve']; ?></td>
                            <td><?php echo $finca['Altura']; ?></td>
                            <?php if ($finca['Estado'] == 1) { ?>
                            <td>Activo</td>
                            <?php } ?>
                            <?php if ($finca['Estado'] == 0) { ?>
                            <td>Inactivo</td>
                            <?php } ?>
                            <td> <a id="editar" class="btn" title="Editar"
                                    href="editar.php?txtID=<?php echo $finca['id']; ?>" role="button">Editar</a>
                                <a id="borrar" class="btn" title="Estado"
                                    href="javascript:borrar(<?php echo $finca['id']; ?>);" role="button">Estado</a>
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