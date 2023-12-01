<!-- SQL Trabajadores -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM `trabajadores`");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $trabajador = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($trabajador['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE trabajadores SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE trabajadores SET Estado = :Estado Where Id = :Id");
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

<!-- Contenedor Datos Trabajadores -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Trabajadores</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">EPS</th>
                            <th scope="col">ARL</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <div> <a href="../../secciones/Empleados/reportePDF.php"><img src="../../Img/ImpresoraPDF.png"
                                width="70" height="60" align="right" title="Exportar a PDF" href=""></a>
                    </div>
                    <tbody>
                        <?php foreach ($empleados as $empleado) { ?>
                        <tr class="">
                            <td><?php echo $empleado['Nombre']; ?></td>
                            <td><?php echo $empleado['Documento']; ?></td>
                            <td><?php echo $empleado['Telefono']; ?></td>
                            <td><?php echo $empleado['FechaDeNacimiento']; ?></td>
                            <td><?php echo $empleado['Eps']; ?></td>
                            <td><?php echo $empleado['Arl']; ?></td>
                            <?php if ($empleado['Estado'] == 1) { ?>
                            <td>Activo</td>
                            <?php } ?>
                            <?php if ($empleado['Estado'] == 0) { ?>
                            <td>Inactivo</td>
                            <?php } ?>
                            <td> <a id="editar" class="btn" title="Editar"
                                    href="editar.php?txtID=<?php echo $empleado['Id']; ?>" role="button">Editar</a>
                                <a id="borrar" class="btn" title="Estado"
                                    href="javascript:borrar(<?php echo $empleado['Id']; ?>);" role="button">Estado</a>
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