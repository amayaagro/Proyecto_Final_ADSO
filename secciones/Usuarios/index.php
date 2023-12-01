<!-- Página Usuario -->

<!-- SQL Usuario -->
<?php
include "../../bd.php";

$sentencia = $conexion->prepare("SELECT * FROM `usuarios`");
$sentencia->execute();
$usuarios = $sentencia->fetchall(PDO::FETCH_ASSOC);

if (isset($_GET['txtID'])) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE Id = :Id");
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $trabajador = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($trabajador['Estado'] == 1) {
        $estado = 0;
        $sentencia = $conexion->prepare("UPDATE usuarios SET Estado = :Estado Where Id = :Id");
        $sentencia->bindParam(":Estado", $estado);
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
    } else {
        $estado = 1;
        $sentencia = $conexion->prepare("UPDATE usuarios SET Estado = :Estado Where Id = :Id");
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
<!-- Contenedor Datos Usuario -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Usuarios</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <a name="" id="btncrear" class="btn" title="Agregar" href="crear.php" role="button">Agregar</a>
            <div class="table-responsive-sm">
                <table id="tabla_id" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                        <tr class="">
                            <td><?php echo $usuario['Nombre']; ?></td>
                            <td><?php echo $usuario['Correo']; ?></td>
                            <td><?php echo $usuario['Usuario']; ?></td>
                            <td>*******</td>
                            <?php if ($usuario['Estado'] == 1) { ?>
                            <td>Activo</td>
                            <?php } ?>
                            <?php if ($usuario['Estado'] == 0) { ?>
                            <td>Inactivo</td>
                            <?php } ?>
                            <td> <a id="editar" class="btn" title="Editar"
                                    href="editar.php?txtID=<?php echo $usuario['Id']; ?>" role="button">Editar</a>
                                <a id="borrar" class="btn" title="Estado"
                                    href="javascript:borrar(<?php echo $usuario['Id']; ?>);" role="button">Estado</a>
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