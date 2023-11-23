<!-- Reporte Planilla Recolección -->
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

    <!-- Tabla Planilla de Recolección -->
    <?php

    include("../../bd.php");

    $sentecia = $conexion->prepare("SELECT *, (SELECT Nombre FROM trabajadores where trabajadores.Id = planilladerecoleccion.Responsable) as empleado
FROM planilladerecoleccion");
    $sentecia->execute();
    $recoleccion = $sentecia->fetchall(PDO::FETCH_ASSOC);

    if (isset($_GET['txtID'])) {
        $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

        $sentencia = $conexion->prepare("SELECT * FROM planilladerecoleccion WHERE Id = :Id");
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
        $recoleccion = $sentencia->fetch(PDO::FETCH_LAZY);

        if ($recoleccion['Estado'] == 1) {
            $estado = 0;
            $sentencia = $conexion->prepare("UPDATE planilladerecoleccion SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        } else {
            $estado = 1;
            $sentencia = $conexion->prepare("UPDATE planilladerecoleccion SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        }

        $mensaje = "Estado Actualizado";
        header("Location:index.php?mensaje=" . $mensaje);
    }
    ?>

    <!-- Reporte Planilla de Recolección -->
    <div class="title">
        <h1 align="center" id="Titulo" aling="center"><strong>Reporte Planilla de Recolección</strong></h1>
    </div>
    <p></p>
    <div align="center">
        <table class="table" id="tabla_id">
            <thead>
                <tr>
                    <td colspan="8"><strong>Datos Recolección</strong></td>
                </tr>
                <tr>
                    <th scope="col">
                        <div align="center">Fecha de Recolección</div>
                    </th>
                    <th scope="col">
                        <div align="center">Responsable</div>
                    </th>
                    <th scope="col">
                        <div align="center">Kilos Recolectados</div>
                    </th>
                    <th scope="col">
                        <div align="center">Jornales Empleados</div>
                    </th>
                    <th scope="col">
                        <div align="center">Valor Neto</div>
                    </th>
                    <th scope="col">
                        <div align="center">Descuentos</div>
                    </th>
                    <th scope="col">
                        <div align="center">Total</div>
                    </th>
                    <th scope="col">
                        <div align="center">Estado</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recoleccion as $recolector) { ?>
                    <tr class="">
                        <td scope="row">
                            <div align="center"><?php echo $recolector['FechaDeRecoleccion']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="left"><?php echo $recolector['empleado']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="center"><?php echo $recolector['KilosRecolectados']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="center"><?php echo $recolector['JornalesRecoleccion']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="center"><?php echo $recolector['ValorNeto']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="center"><?php echo $recolector['Descuentos']; ?></div>
                        </td>
                        <td scope="row">
                            <div align="center"><?php echo $recolector['Total']; ?></div>
                        </td>
                        <?php if ($recolector['Estado'] == 1) { ?>
                            <td>
                                <div align="center">Activo</div>
                            </td>
                        <?php } ?>
                        <?php if ($recolector['Estado'] == 0) { ?>
                            <td>
                                <div align="center">Inactivo</div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<!-- Parametros Reporte Insumos -->
<?php
$html = ob_get_clean();
//echo $html; 

include '../../Library/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->SetOptions($options);
$dompdf->loadHTML($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Recoleccion.pdf", array("Attachment" => true));
?>