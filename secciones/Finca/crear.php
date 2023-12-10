<!-- Crear Finca -->

<!-- SQL Crear Finca -->
<?php
include("../../bd.php");
if ($_POST) {
    $nombre = (isset($_POST['nombredelpredio']) ? $_POST['nombredelpredio'] : "");
    $vereda = (isset($_POST['vereda']) ? $_POST['vereda'] : "");
    $municipio = (isset($_POST['municipio']) ? $_POST['municipio'] : "");
    $departamento = (isset($_POST['departamento']) ? $_POST['departamento'] : "");
    $tamaño = (isset($_POST['tamaño']) ? $_POST['tamaño'] : "");
    $temperatura = (isset($_POST['temperatura']) ? $_POST['temperatura'] : "");
    $brillosolar = (isset($_POST['brillosolar']) ? $_POST['brillosolar'] : "");
    $lluvia = (isset($_POST['lluvia']) ? $_POST['lluvia'] : "");
    $humedadrelativa = (isset($_POST['humedadrelativa']) ? $_POST['humedadrelativa'] : "");
    $relieve = (isset($_POST['relieve']) ? $_POST['relieve'] : "");
    $altura = (isset($_POST['altura']) ? $_POST['altura'] : "");
    $Estado = (isset($_POST['Estado']) ? $_POST['Estado'] : "1");
    $sentencia = $conexion->prepare("INSERT INTO `finca` (`id`, `Nombredelpredio`, `Vereda`, `Municipio`, `Departamento`, `Tamano`, `Temperatura`, `Lluvia`, `BrilloSolar`, `HumedadRelativa`, `Relieve`, `Altura`, `Estado`) 
        VALUES (NULL, :Nombredelpredio, :Vereda, :Municipio, :Departamento, :Tamano, :Temperatura, :Lluvia, :BrilloSolar, :HumedadRelativa, :Relieve, :Altura, :Estado);	
        ");
    $sentencia->bindParam(":Nombredelpredio", $nombre);
    $sentencia->bindParam(":Vereda", $vereda);
    $sentencia->bindParam(":Municipio", $municipio);
    $sentencia->bindParam(":Departamento", $departamento);
    $sentencia->bindParam(":Tamano", $tamaño);
    $sentencia->bindParam(":Temperatura", $temperatura);
    $sentencia->bindParam(":BrilloSolar", $brillosolar);
    $sentencia->bindParam(":Lluvia", $lluvia);
    $sentencia->bindParam(":HumedadRelativa", $humedadrelativa);
    $sentencia->bindParam(":Relieve", $relieve);
    $sentencia->bindParam(":Altura", $altura);
    $sentencia->bindParam(":Estado", $Estado);
    $sentencia->execute();
    $mensaje = "Registro creado";
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
<!-- Formulario Crear Finca -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registrar Finca</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombredelpredio" class="form-label">Nombre del Predio</label>
                    <input type="text" class="form-control" name="nombredelpredio" id="nombredelpredio" value="" required aria-describedby="helpId" placeholder="Ingrese el nombre del predio">
                </div>
                <div class="mb-3">
                    <label for="vereda" class="form-label">Vereda</label>
                    <input type="text" class="form-control" name="vereda" id="vereda" aria-describedby="helpId" value="" required placeholder="Ingrese la vereda">
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Municipio</label>
                    <input type="text" class="form-control" name="municipio" id="municipio" value="" required aria-describedby="helpId" placeholder="Ingrese el municipio">
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" class="form-control" name="departamento" id="departamento" value="" required aria-describedby="helpId" placeholder="ingrese el departamento">
                </div>
                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño (Ha)</label>
                    <input type="number" class="form-control" name="tamaño" id="tamaño" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese el tamaño">
                </div>
                <div class="mb-3">
                    <label for="temperatura" class="form-label">Temperatura (°C)</label>
                    <input type="number" class="form-control" name="temperatura" id="temperatura" value="" min="0" required aria-describedby="helpId" placeholder="ingrese la temperatura">
                </div>
                <div class="mb-3">
                    <label for="brillosolar" class="form-label">Brillo Solar (h/año)</label>
                    <input type="number" class="form-control" name="brillosolar" id="brillosolar" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese el brillo solar">
                </div>
                <div class="mb-3">
                    <label for="lluvia" class="form-label">Lluvia (mm)</label>
                    <input type="number" class="form-control" name="lluvia" id="lluvia" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese la lluvia">
                </div>
                <div class="mb-3">
                    <label for="humedadrelativa" class="form-label">Humedad Relativa (%HR)</label>
                    <input type="number" class="form-control" name="humedadrelativa" id="humedadrelativa" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese la humedad relativa">
                </div>
                <div class="mb-3">
                    <label for="relieve" class="form-label">Relieve (plano, ondulado, quebrado)</label>
                    <input type="text" class="form-control" name="relieve" id="relieve" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese el relieve">
                </div>
                <div class="mb-3">
                    <label for="altura" class="form-label">Altura (m.s.n.m)</label>
                    <input type="number" class="form-control" name="altura" id="altura" value="" min="0" required aria-describedby="helpId" placeholder="Ingrese la altura">
                </div>
                </br>
                <button type="submit" id="guardar" class="btn" title="Agregar">Agregar</button>
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