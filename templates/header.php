<!-- header -->

<?php 
    session_start();
    $urlBase ="http://localhost:80/kahwa/";
    if($_SESSION['logueado']==false)
    {
        header("Location:".$urlBase."login.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <title>Kahwasoft</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous">
    </script> 
    <link rel="stylesheet" href="http://localhost/kahwa/Css/Styles.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">     
    </script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!-- Menú de Navegación -->
<body>
    <header>       
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li>
                            <a class="nav-link active" title="Inicio" href="<?php echo $urlBase?>" aria-current="page"><span class="visually-hidden">(current)</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                            </svg></a>
                        </li>
                        <li>
                            <a class="nav-link" title="Usuarios" href="<?php echo $urlBase;?>secciones/Usuarios">Usuarios</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Fincas" href="<?php echo $urlBase;?>secciones/Finca">Fincas</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Lotes" href="<?php echo $urlBase;?>secciones/Lote">Lotes</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Cultivos" href="<?php echo $urlBase;?>secciones/Cultivo">Cultivos</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Trabajadores" href="<?php echo $urlBase;?>secciones/Empleados">Trabajadores</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Equipos" href="<?php echo $urlBase;?>secciones/Equipo">Equipos</a>
                        </li>

                        <li>
                            <a class="nav-link" title="Herramientas" href="<?php echo $urlBase;?>secciones/Herramientas">Herramientas</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Insumos" href="<?php echo $urlBase;?>secciones/Inventario">Insumos</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Labores" href="<?php echo $urlBase;?>secciones/Labor">Labores</a>
                        </li>

                        <li>
                            <a class="nav-link" title="Asignación Labores" href="<?php echo $urlBase;?>secciones/PlantillaDeTareas">Asignación de labores</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Recolección" href="<?php echo $urlBase;?>secciones/PlantillaDeRecoleccion">Recolección</a>
                        </li>
                        <li>
                            <a class="nav-link" title="Pagos" href="<?php echo $urlBase;?>secciones/PlantillaDePago">Pagos</a>
                        </li>
                        <li>
                        <li>
                            <a class="nav-link" title="Copia Seguridad" href="<?php echo $urlBase;?>secciones/Copia">Copia Seguridad</a>
                        </li>
                        <li>
                            <a href="/../kahwa/secciones/Ayuda/index.php" title="Página de Ayuda"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="margin: 10px" class="bi bi-question-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                              </svg></a>
                        </li>
                        <li>
                            <a class="nav-link" title="Cerrar Sesión" href="<?php echo $urlBase;?>cerrar.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="margin:3px" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>Cerrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    
        <main class="container">
    
    <?php if((isset($_GET['mensaje']))) {?>
    <script>
        Swal.fire({icon:"success",title:"<?php echo $_GET['mensaje'];?>"});
    </script>
    <?php }?>
