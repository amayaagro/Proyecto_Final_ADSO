<!-- Reporte Equipos -->
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
    <link rel="stylesheet" href="http://localhost/kahwa/Css/reporte.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include("../../bd.php");

    $sentecia = $conexion->prepare("SELECT *, (SELECT Nombre FROM trabajadores where trabajadores.Id = equipo.Responsable) as empleado
    FROM equipo");
    $sentecia->execute();
    $equipos = $sentecia->fetchall(PDO::FETCH_ASSOC);

    if (isset($_GET['txtID'])) {
        $txtId = (isset($_GET['txtID']) ? $_GET['txtID'] : "");

        $sentencia = $conexion->prepare("SELECT * FROM equipo WHERE Id = :Id");
        $sentencia->bindParam(":Id", $txtId);
        $sentencia->execute();
        $equipo = $sentencia->fetch(PDO::FETCH_LAZY);

        if ($equipo['Estado'] == 1) {
            $estado = 0;
            $sentencia = $conexion->prepare("UPDATE equipo SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        } else {
            $estado = 1;
            $sentencia = $conexion->prepare("UPDATE equipo SET Estado = :Estado Where Id = :Id");
            $sentencia->bindParam(":Estado", $estado);
            $sentencia->bindParam(":Id", $txtId);
            $sentencia->execute();
        }

        $mensaje = "Estado Actualizado";
        header("Location:index.php?mensaje=" . $mensaje);
    }

    ?>

    <!-- Reporte Equipos -->
    <div class="title">
        <h1 align="center" id="Titulo" aling="center"><strong>Reporte de Equipos</strong></h1>
    </div>
    <p></p>
    <div align="center">
        <table class="table" id="tabla_id" align="center" width="1000" border="1" cellspacing="1">
            <thead>
                <tr>
                    <td colspan="7"><strong>Datos de los Equipos Actuales</strong></td>
                </tr>
                <tr>
                    <th scope="col">
                        <div align="center">Nombre</div>
                    </th>
                    <th scope="col">
                        <div align="center">Cantidad</div>
                    </th>
                    <th scope="col">
                        <div align="center">Responsable</div>
                    </th>
                    <th scope="col">
                        <div align="center">Fecha de Entrega</div>
                    </th>
                    <th scope="col">
                        <div align="center">Fecha de Recibido</div>
                    </th>
                    <th scope="col">
                        <div align="center">Fecha de Mantenimiento</div>
                    </th>
                    <th scope="col">
                        <div align="center">Estado</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipos as $equipo) { ?>
                    <tr class="">
                        <td>
                            <div align="left"><?php echo $equipo['NombreEquipo']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $equipo['Cantidad']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $equipo['empleado']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $equipo['FechaDeEntrega']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $equipo['FechaDeRecibido']; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $equipo['FechaDeMantenimiento']; ?></div>
                        </td>
                        <?php if ($equipo['Estado'] == 1) { ?>
                            <td>
                                <div align="center">Activo</div>
                            </td>
                        <?php } ?>
                        <?php if ($equipo['Estado'] == 0) { ?>
                            <td>
                                <div align="center">Inactivo</div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>

<!-- Parametros Reporte Equipos -->
<?php
$html = ob_get_clean();
//echo $html; 

require_once '../../Library/dompdf/autoload.inc.php';

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
$dompdf->stream("Equipos.pdf", array("Attachment" => true));
?>