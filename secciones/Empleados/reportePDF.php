<!-- Reporte Trabajadores -->
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
    <?php

    include('../../bd.php');

    $sentencia = $conexion->prepare("SELECT * FROM `trabajadores`");
    $sentencia->execute();
    $empleados = $sentencia->fetchall(PDO::FETCH_ASSOC);

    ?>

    <!-- Resporte Trabajadores -->
    <div class="title">
        <h1 align="center" id="Titulo" aling="center"><strong>Reporte de Trabajadores</strong></h1>
    </div>
    <p></p>
    <div align="center">
        <table class="table" id="tabla_id" align="center" width="1000" border="1" cellspacing="1">
            <thead>
                <tr>
                    <td colspan="7"><strong>Datos Trabajadores Actuales</strong></td>
                </tr>
                <tr>
                    <th scope="col">
                        <div align="center">Nombre</div>
                    </th>
                    <th scope="col">
                        <div align="center">Documento</div>
                    </th>
                    <th scope="col">
                        <div align="center">Teléfono</div>
                    </th>
                    <th scope="col">
                        <div align="center">Fecha de Nacimiento</div>
                    </th>
                    <th scope="col">
                        <div align="center">EPS</div>
                    </th>
                    <th scope="col">
                        <div align="center">ARL</div>
                    </th>
                    <th scope="col">
                        <div align="center">Estado</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado) { ?>
                    <tr class="">
                        <td>
                            <div align="left"><?php echo $empleado['Nombre']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $empleado['Documento']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $empleado['Telefono']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $empleado['FechaDeNacimiento']; ?></div>
                        </td>
                        <td>
                            <div align="left"><?php echo $empleado['Eps']; ?></div>
                        </td>
                        <td>
                            <div align="left"><?php echo $empleado['Arl']; ?></div>
                        </td>
                        <?php if ($empleado['Estado'] == 1) { ?>
                            <td>
                                <div align="center">Activo</div>
                            </td>
                        <?php } ?>
                        <?php if ($empleado['Estado'] == 0) { ?>
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

<!-- Parametros Reporte Trabajadores -->
<?php

$html = ob_get_clean();

require('../../Library/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->SetOptions($options);
$dompdf->set_option('Arial', 'Courier');
$dompdf->loadHTML($html);
//$dompdf->setPaper('letter');
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Trabajadores.pdf", array("Attachment" => true));
?>