<!-- SQL Crear Pago -->
<?php
include("../../bd.php");

$sentencia = $conexion->prepare("SELECT * FROM trabajadores WHERE Estado = 1");
$sentencia->execute();
$empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

if ($_POST) {
    $fechadepago = (isset($_POST['fechadepago']) ? $_POST['fechadepago'] : "");
    $trabajador = (isset($_POST['trabajador']) ? $_POST['trabajador'] : "");
    $sueldo = (isset($_POST['sueldo']) ? $_POST['sueldo'] : "");
    $descuento = (isset($_POST['descuento']) ? $_POST['descuento'] : "");
    $valortotal = (isset($_POST['valortotal']) ? $_POST['valortotal'] : "");
    $estado = (isset($_POST['estado']) ? $_POST['estado'] : "1");

    $sentencia = $conexion->prepare("INSERT INTO `planilladepago` (`Id`, `FechaDePago`, `Trabajador`, `Sueldo`, `Descuento`, `ValorTotal`, `Estado`) 
        VALUES (NULL, :FechaDePago, :Trabajador, :Sueldo, :Descuento, :ValorTotal, :Estado)");
    $sentencia->bindParam(":FechaDePago", $fechadepago);
    $sentencia->bindParam(":Trabajador", $trabajador);
    $sentencia->bindParam(":Sueldo", $sueldo);
    $sentencia->bindParam(":Descuento", $descuento);
    $sentencia->bindParam(":ValorTotal", $valortotal);
    $sentencia->bindParam(":Estado", $estado);
    $sentencia->execute();
    $mensaje = "Pago Registrado";
    header("Location:index.php?mensaje=" . $mensaje);
}

?>

<!-- Header -->
<?php include("../../templates/header.php"); ?>

<br />
<!-- Formulario Crear Insumo -->
<div class="card">
    <div class="content">
        <div class="title">
            <h2 id="Titulo"><strong>Registro de Pago</strong><img src="../../Img/Logo.png" width="230" height="80"
                    align="right"></h2>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fechadepago" class="form-label">Fecha de Pago</label>
                    <input type="date" class="form-control" name="fechadepago" id="fechadepago"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="trabajador" class="form-label">Trabajador</label>
                    <select class="form-select form-select-sm" name="trabajador" id="trabajador">
                        <?php foreach ($empleados as $empleado) { ?>
                        <option value="<?php echo $empleado['Id']; ?>"><?php echo $empleado['Nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sueldo" class="form-label">Valor Neto</label>
                    <input type="number" onChange="CalcularTotal()" class="form-control" name="sueldo" id="sueldo"
                        value="" required aria-describedby="helpId" placeholder="Ingrese el valor neto">
                </div>
                <div class="mb-3">
                    <label for="descuento" class="form-label">Descuento</label>
                    <input type="number" onChange="CalcularTotal()" class="form-control" name="descuento" id="descuento"
                        value="" required aria-describedby="helpId" placeholder="Ingrese el descuento">
                </div>
                <div class="mb-3">
                    <label for="valortotal" class="form-label">Valor a Pagar</label>
                    <input type="number" class="form-control" name="valortotal" id="valortotal"
                        aria-describedby="helpId" placeholder="Ingrese el valor total">
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

    var descuento = $("#descuento").val();
    var sueldo = $("#sueldo").val();

    if (descuento >= 0 && sueldo >= 0) {
        $("#valortotal").val(sueldo - descuento);
    }

}
</script>

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