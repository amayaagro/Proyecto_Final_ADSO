<!-- SQL Editar Finca -->
<?php
include("../../bd.php");

if ($_GET['txtID']) {
    $txtID = (isset($_GET['txtID']) ? $_GET['txtID'] : !"");
    $sentencia = $conexion->prepare("SELECT * FROM finca WHERE id = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $finca = $sentencia->fetch(PDO::FETCH_LAZY);

    $nombre = $finca['Nombredelpredio'];
    $vereda = $finca['Vereda'];
    $municipio = $finca['Municipio'];
    $departamento = $finca['Departamento'];
    $tamano = $finca['Tamano'];
    $temperatura = $finca['Temperatura'];
    $lluvia = $finca['Lluvia'];
    $brilloSolar = $finca['BrilloSolar'];
    $humedadrelativa = $finca['HumedadRelativa'];
    $relieve = $finca['Relieve'];
    $altura = $finca['Altura'];
}

if ($_POST) {
    $txtId = (isset($_POST['txtId']) ? $_POST['txtId'] : "");
    $nombre = (isset($_POST['nombredelpredio']) ? $_POST['nombredelpredio'] : "");
    $vereda = (isset($_POST['vereda']) ? $_POST['vereda'] : "");
    $municipio = (isset($_POST['municipio']) ? $_POST['municipio'] : "");
    $departamento = (isset($_POST['departamento']) ? $_POST['departamento'] : "");
    $humedadrelativa = (isset($_POST['humedadrelativa']) ? $_POST['humedadrelativa'] : "");
    $tamano = (isset($_POST['tamaño']) ? $_POST['tamaño'] : "");
    $brilloSolar = (isset($_POST['brillosolar']) ? $_POST['brillosolar'] : "");
    $lluvia = (isset($_POST['lluvia']) ? $_POST['lluvia'] : "");
    $temperatura = (isset($_POST['temperatura']) ? $_POST['temperatura'] : "");
    $relieve = (isset($_POST['relieve']) ? $_POST['relieve'] : "");
    $altura = (isset($_POST['altura']) ? $_POST['altura'] : "");

    $sentencia = $conexion->prepare("UPDATE finca SET
        Nombredelpredio = :nombredelpredio,
        Vereda = :vereda,
        Municipio = :municipio,
        Departamento = :departamento,
        Tamano = :tamano,
        Temperatura = :temperatura,
        Lluvia = :lluvia,
        BrilloSolar = :brilloSolar,
        HumedadRelativa = :humedadrelativa,
        Relieve = :relieve,
        Altura = :altura
        WHERE id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->bindParam(":nombredelpredio", $nombre);
    $sentencia->bindParam(":vereda", $vereda);
    $sentencia->bindParam(":municipio", $municipio);
    $sentencia->bindParam(":departamento", $departamento);
    $sentencia->bindParam(":tamano", $tamano);
    $sentencia->bindParam(":temperatura", $temperatura);
    $sentencia->bindParam(":lluvia", $lluvia);
    $sentencia->bindParam(":brilloSolar", $brilloSolar);
    $sentencia->bindParam(":humedadrelativa", $humedadrelativa);
    $sentencia->bindParam(":relieve", $relieve);
    $sentencia->bindParam(":altura", $altura);
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

<!-- Formulario Editar Finca -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Finca</strong><img src="../../Img/Logo.png" width="230" height="80" align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="txtId" class="form-label">Id</label>
                    <input type="number" value="<?php echo $txtID; ?>" class="form-control" readonly name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID">
                </div>
                <div class="mb-3">
                    <label for="nombredelpredio" class="form-label">Nombre Del Predio</label>
                    <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombredelpredio" id="nombredelpredio" aria-describedby="helpId" placeholder="Ingrese el nombre del predio">
                </div>
                <div class="mb-3">
                    <label for="vereda" class="form-label">Vereda</label>
                    <input type="text" value="<?php echo $vereda; ?>" class="form-control" name="vereda" id="vereda" aria-describedby="helpId" placeholder="Ingrese la vereda">
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Municipio</label>
                    <input type="text" value="<?php echo $municipio; ?>" class="form-control" name="municipio" id="municipio" aria-describedby="helpId" placeholder="Ingrese el municipio">
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento</label>
                    <input type="text" value="<?php echo $departamento; ?>" class="form-control" name="departamento" id="departamento" aria-describedby="helpId" placeholder="ingrese el departamento">
                </div>
                <div class="mb-3">
                    <label for="tamaño" class="form-label">Tamaño (Ha)</label>
                    <input type="number" value="<?php echo $tamano; ?>" class="form-control" name="tamaño" id="tamaño" aria-describedby="helpId" placeholder="Ingrese el tamaño">
                </div>
                <div class="mb-3">
                    <label for="temperatura" class="form-label">Temperatura (°C)</label>
                    <input type="number" value="<?php echo $temperatura; ?>" class="form-control" name="temperatura" id="temperatura" aria-describedby="helpId" placeholder="ingrese la temperatura">
                </div>
                <div class="mb-3">
                    <label for="brillosolar" class="form-label">Brillo Solar (h/año)</label>
                    <input type="number" value="<?php echo $brilloSolar; ?>" class="form-control" name="brillosolar" id="brillosolar" aria-describedby="helpId" placeholder="Ingrese el brillo solar">
                </div>
                <div class="mb-3">
                    <label for="lluvia" class="form-label">Lluvia (mm)</label>
                    <input type="number" value="<?php echo $lluvia; ?>" class="form-control" name="lluvia" id="lluvia" aria-describedby="helpId" placeholder="Ingrese la lluvia">
                </div>
                <div class="mb-3">
                    <label for="humedadrelativa" class="form-label">Humedad Relativa (%HR)</label>
                    <input type="number" value="<?php echo $humedadrelativa; ?>" class="form-control" name="humedadrelativa" id="humedadrelativa" aria-describedby="helpId" placeholder="Ingrese la humedad relativa">
                </div>
                <div class="mb-3">
                    <label for="relieve" class="form-label">Relieve (plano, ondulado, quebrado)</label>
                    <input type="text" value="<?php echo $relieve; ?>" class="form-control" name="relieve" id="relieve" aria-describedby="helpId" placeholder="Ingrese el relieve">
                </div>
                <div class="mb-3">
                    <label for="altura" class="form-label">Altura (m.s.n.m)</label>
                    <input type="number" value="<?php echo $altura; ?>" class="form-control" name="altura" id="altura" aria-describedby="helpId" placeholder="Ingrese la altura">
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

<!-- Social footer -->
<?php include("../../templates/socfooter.php"); ?>