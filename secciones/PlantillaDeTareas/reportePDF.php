<!-- Reporte Labores -->
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/reporte.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>

    <!-- Tabla Labores -->
    <?php

    include "../../bd.php";

    $sentencia = $conexion->prepare("SELECT *, (SELECT Nombre FROM trabajadores where trabajadores.Id = plantillalabores.Encargado) as empleado,
(SELECT Nombredelpredio FROM finca where finca.id = plantillalabores.Finca) as FincaDeTrabajo,
(SELECT NombreLote FROM lote where lote.Id = plantillalabores.Lote) as LoteDeTrabajo,
(SELECT labor FROM labores WHERE labores.Id = plantillalabores.Labor) as LaborDeTrabajo
FROM plantillalabores");
    $sentencia->execute();
    $asignaciondetareas = $sentencia->fetchall(PDO::FETCH_ASSOC);

    if (isset($_GET['txtID'])) {
        $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

        $sentencia = $conexion->prepare("SELECT * FROM plantillalabores WHERE Id = :Id");
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
        $tarea = $sentencia->fetch(PDO::FETCH_LAZY);

        if ($tarea['Estado'] == 1) {
            $estado = 0;
            $sentencia = $conexion->prepare("UPDATE plantillalabores SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        } else {
            $estado = 1;
            $sentencia = $conexion->prepare("UPDATE plantillalabores SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        }

        $mensaje = "Estado Actualizado";
        header("Location:index.php?mensaje=" . $mensaje);
    }

    ?>

    <!-- Reporte Labores -->
    <div class="title">
        <h1 align="center" id="Titulo" aling="center"><strong>Reporte Asignación de Labores</strong></h1>
    </div>
    <p></p>
    <div align="center">
        <table class="table" id="tabla_id" align="center" width="1000" border="1" cellspacing="1">
            <thead>
                <tr>
                    <td colspan="5"><strong>Datos Planilla de Labores Actuales</strong></td>
                </tr>
                <th scope="col">
                    <div align="center">Finca</div>
                </th>
                <th scope="col">
                    <div align="center">Lote</div>
                </th>
                <th scope="col">
                    <div align="center">Responsable</div>
                </th>
                <th scope="col">
                    <div align="center">Labor</div>
                </th>
                <th scope="col">
                    <div align="center">Estado</div>
                </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asignaciondetareas as $tarea) { ?>
                <tr class="">
                    <td>
                        <div align="center"><?php echo $tarea['FincaDeTrabajo']; ?></div>
                    </td>
                    <td>
                        <div align="center"><?php echo $tarea['LoteDeTrabajo']; ?></div>
                    </td>
                    <td>
                        <div align="left"><?php echo $tarea['empleado']; ?></div>
                    </td>
                    <td>
                        <div align="left"><?php echo $tarea['LaborDeTrabajo']; ?></div>
                    </td>
                    <?php if ($tarea['Estado'] == 1) { ?>
                    <td>
                        <div align="center">Activo</div>
                    </td>
                    <?php } ?>
                    <?php if ($tarea['Estado'] == 0) { ?>
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

<!-- Parametros Reporte pdf Trabajadores -->
<?php

$html = ob_get_clean();

require '../../Library/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->setDefaultFont('Courier');
$dompdf->setOptions($options);
$dompdf->loadHTML($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Trabajadores.pdf", array("Attachment" => false));
?>