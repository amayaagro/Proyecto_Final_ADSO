<!-- SQL Editar Finca -->
<?php
include("../../bd.php");

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $usuarios = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $usuarios['Nombre'];
    $correo = $usuarios['Correo'];
    $usuario = $usuarios['Usuario'];
    $password = $usuarios['Password'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
    $usuario = (isset($_POST['nombreusuario']) ? $_POST['nombreusuario'] : "");
    $password = (isset($_POST['contraseña']) ? $_POST['contraseña'] : "");

    $sentencia = $conexion->prepare("UPDATE usuarios SET
        Nombre = :Nombre,
        Correo = :Correo,
        Usuario = :Usuario,
        Password = :Password
        WHERE Id = :Id");
    $sentencia->bindParam(":Nombre", $nombre);
    $sentencia->bindParam(":Correo", $correo);
    $sentencia->bindParam(":Usuario", $usuario);
    $sentencia->bindParam(":Password", $password);
    $sentencia->bindParam(":Id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}
?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Editar Usuario -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Editar Datos Usuario</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtId; ?>" class="form-control" readonly name="txtId"
                        id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre"
                        aria-describedby="helpId" placeholder="Ingrese el nombre">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" value="<?php echo $correo; ?>" class="form-control" name="correo" id="correo"
                        aria-describedby="helpId" placeholder="Ingrese el correo">
                </div>
                <div class="mb-3">
                    <label for="nombreusuario" class="form-label">Nombre de usuario</label>
                    <input type="text" value="<?php echo $usuario; ?>" class="form-control" name="nombreusuario"
                        id="nombreusuario" aria-describedby="helpId" placeholder="Ingrese el nombre de usuario">
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" value="<?php echo $password; ?>" class="form-control" name="contraseña"
                        id="contraseña" aria-describedby="helpId" placeholder="Ingrese la contraseña">
                </div>
                </br>
                <button type="submit" id="guardar" title="Actualizar" class="btn">Actualizar</button>
                &nbsp&nbsp
                <a name="" id="cancelar" class="btn" href="index.php" title="Cancelar" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include("../../templates/footer.php"); ?>

<!-- Social footer -->
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