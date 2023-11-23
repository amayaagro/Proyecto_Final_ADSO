<!-- SQL Editar Cultivo -->
<?php
include("../../bd.php");

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM cultivo WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $cultivo = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombrecultivo = $cultivo['Cultivo'];
    $descripcion = $cultivo['Descripcion'];
    $estado = $cultivo['Estado'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $nombrecultivo = (isset($_POST['nombredelcultivo']) ? $_POST['nombredelcultivo'] : "");
    $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");

    $sentencia = $conexion->prepare("UPDATE cultivo SET 
                                        Cultivo = :cultivo, 
                                        Descripcion = :descripcion 
                                        WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->bindParam(":cultivo", $nombrecultivo);
    $sentencia->bindParam(":descripcion", $descripcion);
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
<!-- Formulario Editar Cultivo -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Cultivo</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="text" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="nombredelcultivo" class="form-label">Nombre del cultivo</label>
                    <input type="text" value="<?php echo $nombrecultivo; ?>" class="form-control" name="nombredelcultivo" id="nombredelcultivo" aria-describedby="helpId" placeholder="Ingrese el nombre del cultivo">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" value="<?php echo $descripcion; ?>" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Ingrese la descripción del cultivo">
                </div>
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