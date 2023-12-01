<!-- Página Editar Recoleccion -->

<!-- SQL Editar Recolección -->
<?php
include "../../bd.php";

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_GET['txtID']) {
    $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

    $sentencia = $conexion->prepare("SELECT * FROM planilladerecoleccion WHERE Id = :id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $recoleccion = $sentencia->fetch(PDO::FETCH_LAZY);

    $FechaDeRecoleccion = $recoleccion['FechaDeRecoleccion'];
    $Responsable = $recoleccion['Responsable'];
    $KilosRecolectados = $recoleccion['KilosRecolectados'];
    $JornalesRecoleccion = $recoleccion['JornalesRecoleccion'];
    $ValorNeto = $recoleccion['ValorNeto'];
    $Descuentos = $recoleccion['Descuentos'];
    $Total = $recoleccion['Total'];
}

if ($_POST) {
    $fechaderecoleccion = (isset($_POST['fechaderecoleccion']) ? $_POST['fechaderecoleccion'] : "");
    $responsable = (isset($_POST['responsable']) ? $_POST['responsable'] : "");
    $kilosrecolectados = (isset($_POST['kilosrecolectados']) ? $_POST['kilosrecolectados'] : "");
    $jornalesderecoleccion = (isset($_POST['jornalesderecoleccion']) ? $_POST['jornalesderecoleccion'] : "");
    $valorneto = (isset($_POST['valorneto']) ? $_POST['valorneto'] : "");
    $descuentos = (isset($_POST['descuentos']) ? $_POST['descuentos'] : "");
    $total = (isset($_POST['total']) ? $_POST['total'] : "");

    $sentencia = $conexion->prepare("UPDATE `planilladerecoleccion` SET 
        FechaDeRecoleccion = :FechaDeRecoleccion, 
        Responsable = :Responsable, 
        KilosRecolectados = :KilosRecolectados,
        JornalesRecoleccion = :JornalesRecoleccion, 
        ValorNeto = :ValorNeto, 
        Descuentos = :Descuentos, 
        Total = :Total
        WHERE Id = :id");
    $sentencia->bindParam(":FechaDeRecoleccion", $fechaderecoleccion);
    $sentencia->bindParam(":Responsable", $responsable);
    $sentencia->bindParam(":KilosRecolectados", $kilosrecolectados);
    $sentencia->bindParam(":JornalesRecoleccion", $jornalesderecoleccion);
    $sentencia->bindParam(":ValorNeto", $valorneto);
    $sentencia->bindParam(":Descuentos", $descuentos);
    $sentencia->bindParam(":Total", $total);
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro actualizado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>
<!-- Header -->
<?php include "../../templates/header.php"; ?>

<br />
<!-- Formulario Editar Recoleccion -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Modificar Datos Cosecha</strong><img src="../../Img/Logo.png" width="230"
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
                    <label for="fechaderecoleccion" class="form-label">Fecha de Recolección</label>
                    <input type="date" value="<?php echo $FechaDeRecoleccion; ?>" class="form-control"
                        name="fechaderecoleccion" id="fechaderecoleccion" aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <select class="form-select form-select-sm" name="responsable" id="responsable">
                        <?php foreach ($empleados as $empleado) { ?>
                        <option <?php echo ($Responsable == $empleado['Id']) ? "selected" : ""; ?>
                            value="<?php echo $empleado['Id']; ?>">
                            <?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kilosrecolectados" class="form-label">Kilos Recolectados</label>
                    <input type="number" value="<?php echo $KilosRecolectados; ?>" class="form-control"
                        name="kilosrecolectados" id="kilosrecolectados" aria-describedby="helpId"
                        placeholder="Kilos Recolectados">
                </div>
                <div class="mb-3">
                    <label for="jornalesderecoleccion" class="form-label">Jornales Empleados</label>
                    <input type="number" value="<?php echo $JornalesRecoleccion; ?>" class="form-control"
                        name="jornalesderecoleccion" id="jornalesderecoleccion" aria-describedby="helpId"
                        placeholder="Ingrese los jornales utilizados en la recolección">
                </div>
                <div class="mb-3">
                    <label for="valorneto" class="form-label">Valor Neto</label>
                    <input type="number" onChange="CalcularTotal()" value="<?php echo $ValorNeto; ?>"
                        class="form-control" name="valorneto" id="valorneto" aria-describedby="helpId"
                        placeholder="Ingrese el valor neto">
                </div>
                <div class="mb-3">
                    <label for="descuentos" class="form-label">Descuento</label>
                    <input type="number" onChange="CalcularTotal()" value="<?php echo $Descuentos; ?>"
                        class="form-control" name="descuentos" id="descuentos" aria-describedby="helpId"
                        placeholder="Ingrese el descuento">
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Valor a Pagar</label>
                    <input type="number" value="<?php echo $Total; ?>" class="form-control" name="total" id="total"
                        aria-describedby="helpId" placeholder="Ingrese el valor a pagar">
                </div>
                </br>
                <button type="submit" id="guardar" class="btn" title="Actualizar">Actualizar</button>
                &nbsp&nbsp
                <a name="" id="cancelar" class="btn" href="index.php" role="button" title="Cancelar">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Función Cálculo Resta -->
<script>
function CalcularTotal() {

    var descuentos = $("#descuentos").val();
    var valorneto = $("#valorneto").val();

    if (descuentos >= 0 && valorneto >= 0) {
        $("#total").val(valorneto - descuentos);
    }

}
</script>

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