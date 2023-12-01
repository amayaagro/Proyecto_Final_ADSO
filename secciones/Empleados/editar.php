<!-- SQL Editar Trabajador -->
<?php
include("../../bd.php");

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $trabajadores = $sentencia->fetch(PDO::FETCH_LAZY);

    $documento = $trabajadores['Documento'];
    $nombre = $trabajadores['Nombre'];
    $telefono = $trabajadores['Telefono'];
    $fechadenacimiento = $trabajadores['FechaDeNacimiento'];
    $eps = $trabajadores['Eps'];
    $arl = $trabajadores['Arl'];
    $estado = $trabajadores['Estado'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $nombre = (isset($_POST['nombrecompleto']) ? $_POST['nombrecompleto'] : "");
    $documento = (isset($_POST['documento']) ? $_POST['documento'] : "");
    $fechadenacimiento = (isset($_POST['fechadenacimiento']) ? $_POST['fechadenacimiento'] : "");
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
    $eps = (isset($_POST['eps']) ? $_POST['eps'] : "");
    $arl = (isset($_POST['arl']) ? $_POST['arl'] : "");

    $sentencia = $conexion->prepare("UPDATE trabajadores SET
                                        Documento = :Documento,
                                        Nombre = :Nombre,
                                        Telefono = :Telefono,
                                        FechaDeNacimiento = :Fechadenacimiento,
                                        Arl = :Arl,
                                        Eps = :Eps
                                        WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->bindParam(":Documento", $documento);
    $sentencia->bindParam(":Nombre", $nombre);
    $sentencia->bindParam(":Telefono", $telefono);
    $sentencia->bindParam(":Fechadenacimiento", $fechadenacimiento);
    $sentencia->bindParam(":Eps", $eps);
    $sentencia->bindParam(":Arl", $arl);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Editar Trabajador -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Datos Trabajador</strong><img src="../../Img/Logo.png" width="230"
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
                    <label for="documento" class="form-label">Documento</label>
                    <input type="number" value="<?php echo $documento ?>" class="form-control" name="documento"
                        id="documento" aria-describedby="helpId" placeholder="Ingrese el documento">
                </div>
                <div class="mb-3">
                    <label for="nombrecompleto" class="form-label">Nombre Completo</label>
                    <input type="text" value="<?php echo $nombre ?>" class="form-control" name="nombrecompleto"
                        id="nombrecompleto" aria-describedby="helpId" placeholder="Ingrese el nombre completo">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="number" value="<?php echo $telefono ?>" class="form-control" name="telefono"
                        id="telefono" aria-describedby="helpId" placeholder="Ingrese el telefono">
                </div>
                <div class="mb-3">
                    <label for="fechadenacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" value="<?php echo $fechadenacimiento ?>" class="form-control"
                        name="fechadenacimiento" id="fechadenacimiento" aria-describedby="helpId"
                        placeholder="Ingrese la fecha de nacimiento">
                </div>
                <div class="mb-3">
                    <label for="eps" class="form-label">EPS</label>
                    <input type="text" value="<?php echo $eps ?>" class="form-control" name="eps" id="eps"
                        aria-describedby="helpId" placeholder="Ingrese la eps">
                </div>
                <div class="mb-3">
                    <label for="arl" class="form-label">ARL</label>
                    <input type="text" value="<?php echo $arl ?>" class="form-control" name="arl" id="arl"
                        aria-describedby="helpId" placeholder="Ingrese la arl">
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