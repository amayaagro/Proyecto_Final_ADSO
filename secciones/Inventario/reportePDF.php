<!-- Reporte Insumos -->
<?php

ob_start();

?>

<!doctype html>
<html lang="en">

<head>
    <title>Kahwa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/reporte.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Tabla Insumos -->
    <?php

    include("../../bd.php");

    $sentencia = $conexion->prepare("SELECT * FROM `inventario`");
    $sentencia->execute();
    $inventario = $sentencia->fetchall(PDO::FETCH_ASSOC);

    if (isset($_GET['txtID'])) {
        $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");
        $sentencia = $conexion->prepare("DELETE FROM `inventario` WHERE Id = :id");
        $sentencia->bindParam(":id", $txtId);
        $sentencia->execute();
        $mensaje = "Registro Eliminado";
        header("Location:index.php?mensaje=" . $mensaje);
    }

    ?>

    <!-- Reporte Insumos -->
    <div class="title">
        <h1 align="center" id="Titulo" aling="center"><strong>Reporte de Insumos</strong></h1>
    </div>
    <p></p>
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">Nombre del Insumo</th>
                <th scope="col">Ingrediente Activo</th>
                <th scope="col">Unidad</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha de Compra</th>
                <th scope="col">Fecha de Vencimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inventario as $insumos) { ?>
                <tr class="">
                    <td><?php echo $insumos['NombreInsumo']; ?></td>
                    <td><?php echo $insumos['IngredienteActivo']; ?></td>
                    <td><?php echo $insumos['Unidad']; ?></td>
                    <td><?php echo $insumos['CantidadEnBodega']; ?></td>
                    <td><?php echo $insumos['FechaDeCompra']; ?></td>
                    <td><?php echo $insumos['FechaDeVencimiento']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<!-- Parametros Reporte Insumos -->
<?php
$html = ob_get_clean();
//echo $html; 

require_once '../../Library/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->SetOptions($options);
$dompdf->loadHTML($html);
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Insumos_.pdf", array("Attachment" => true));
?>