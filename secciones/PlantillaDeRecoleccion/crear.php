<!-- Página Crear Recolección -->
<!-- SQL Crear Recolección -->
<?php
include "../../bd.php";

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_POST) {
    $fechaderecoleccion = (isset($_POST['fechaderecoleccion']) ? $_POST['fechaderecoleccion'] : "");
    $responsable = (isset($_POST['responsable']) ? $_POST['responsable'] : "");
    $kilosrecolectados = (isset($_POST['kilosrecolectados']) ? $_POST['kilosrecolectados'] : "");
    $jornalesderecoleccion = (isset($_POST['jornalesderecoleccion']) ? $_POST['jornalesderecoleccion'] : "");
    $valorneto = (isset($_POST['valorneto']) ? $_POST['valorneto'] : "");
    $descuentos = (isset($_POST['descuentos']) ? $_POST['descuentos'] : "");
    $total = (isset($_POST['total']) ? $_POST['total'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `planilladerecoleccion` (`Id`, `FechaDeRecoleccion`, `Responsable`, `KilosRecolectados`, `JornalesRecoleccion`, `ValorNeto`, `Descuentos`, `Total`, `Estado`)
        VALUES (NULL, :FechaDeRecoleccion,:Responsable, :KilosRecolectados, :JornalesRecoleccion, :ValorNeto, :Descuentos, :Total, :Estado)");
    $sentencia->bindParam(":FechaDeRecoleccion", $fechaderecoleccion);
    $sentencia->bindParam(":Responsable", $responsable);
    $sentencia->bindParam(":KilosRecolectados", $kilosrecolectados);
    $sentencia->bindParam(":JornalesRecoleccion", $jornalesderecoleccion);
    $sentencia->bindParam(":ValorNeto", $valorneto);
    $sentencia->bindParam(":Descuentos", $descuentos);
    $sentencia->bindParam(":Total", $total);
    $sentencia->bindParam(":Estado", $estado);
    $sentencia->execute();
    $mensaje = "Registro recolección creado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>

<!-- Header -->
<?php include "../../templates/header.php"; ?>

<br />
<!-- Formulario Crear Recoleccción -->
<div class="card">
    <div class="content">
        <div class="title">
            <h id="Titulo"><strong>Registrar Recolección</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fechaderecoleccion" class="form-label">Fecha de Recolección</label>
                    <input type="date" class="form-control" name="fechaderecoleccion" id="fechaderecoleccion"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable</label>
                    <select class="form-select form-select-sm" name="responsable" id="responsable">
                        <?php foreach ($empleados as $empleado) { ?>
                        <option value="<?php echo $empleado['Id']; ?>"><?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kilosrecolectados" class="form-label">Kilos Recolectados</label>
                    <input type="number" class="form-control" name="kilosrecolectados" id="kilosrecolectados" value=""
                        required aria-describedby="helpId" placeholder="Kilos Recolectados">
                </div>
                <div class="mb-3">
                    <label for="jornalesderecoleccion" class="form-label">Jornales Empleados</label>
                    <input type="number" class="form-control" name="jornalesderecoleccion" id="jornalesderecoleccion"
                        value="" required aria-describedby="helpId"
                        placeholder="Ingrese los jornales utilizados en la recolección">
                </div>
                <div class="mb-3">
                    <label for="valorneto" class="form-label">Valor Neto</label>
                    <input type="number" onChange="CalcularTotal()" class="form-control" name="valorneto" id="valorneto"
                        value="" required aria-describedby="helpId" placeholder="Ingrese el valor neto">
                </div>
                <div class="mb-3">
                    <label for="descuentos" class="form-label">Descuento</label>
                    <input type="number" onChange="CalcularTotal()" class="form-control" name="descuentos"
                        id="descuentos" value="" required aria-describedby="helpId" placeholder="Ingrese el descuento">
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Valor a Pagar</label>
                    <input type="number" class="form-control" name="total" id="total" aria-describedby="helpId"
                        placeholder="Ingrese el valor total">
                </div>
                </br>
                <button type="submit" id="guardar" class="btn" title="Agregar">Agregar</button>
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