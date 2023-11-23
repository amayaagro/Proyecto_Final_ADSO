<?php require("../../bd.php"); ?>

<!-- SQL Recuperar contraseña -->
<?php
if (isset($_REQUEST['actualizar'])) {

    $codigo = $_REQUEST['codigo'];
    $password = $_REQUEST['password'];

    $sentencia = $conexion->prepare("UPDATE usuarios SET `Password` = :contra Where Codigo = :Codigo");
    $sentencia->bindParam(":Codigo", $codigo);
    $sentencia->bindParam(":contra", $password);
    $sentencia->execute();

    if ($sentencia->rowCount() > 0) {
        $mensaje = "Se ha actualizado la contraseña.";
        header("Location:../../login.php?mensaje=" . $mensaje);
    } else {
        $statusMsg = "Código inválido";
    }
}


if (isset($_REQUEST['correo']) && !empty($_REQUEST['correo']) && !isset($_REQUEST['actualizar'])) {

    $codigo =  random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9) . '' . random_int(0, 9);

    $today = date("Y-m-d H:i:s");

    $sentencia = $conexion->prepare("UPDATE usuarios SET Codigo = :Codigo, Fecha_Codigo = :Fecha_Codigo Where Correo = :correo");
    $sentencia->bindParam(":Codigo", $codigo);
    $sentencia->bindParam(":Fecha_Codigo", $today);
    $sentencia->bindParam(":correo", $_REQUEST['correo']);
    $sentencia->execute();

    $from = "amaya.agrot@gmail.com";
    $to = $_REQUEST['correo'];
    $subject = "Restablecer Contraseña - KahwaSOFT";
    $message = "Se ha solicitado un cambio de contraseña, codigo asignado: " . $codigo;
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);
}
?>

<!-- Página Recuperar Contraseña -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    </script>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/recuperar.css" />
    </script>
    <script>
        (function(d) {
            var s = d.createElement("script");
            s.setAttribute("data-account", "fFgZ6B1nWP");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            s.setAttribute('locale', 'es');
            (d.body || d.head).appendChild(s);
        })(document)
    </script>
    <style>
        .ocultar {
            display: none;

        }

        .mostrar {
            display: block;
        }
    </style>
</head>

<body>

    <body onload="quitar()">

        <!-- Formulario Recuperar Contraseña -->
        <div class="container-r">
            <h1 align=center>Restablecer Contraseña<img src="../../Img/Logo.png" width="311" height="100" align="right"></h1><br>
            <h2 align=left><label for="username">Por favor, ingrese el codigo que
                    llego a su correo electrónico y la nueva contraseña que desea usar</label></h2>
            <p><br></p>
            <p><br></p>
            <?php echo !empty($statusMsg) ? '<p id="errorcod" style="color:red;">' . $statusMsg . '</p>' : ''; ?>
            <div class="mb-3">

                <form action="" method="post" onsubmit="verificarPasswords(); return false" style="margin: left; width: 220px;">
                    <div class="mb-3" display="block">
                        <label for="codigo" class="form-label"><strong>Codigo:</strong></label>
                        <p><br></p>
                        <input type="number" required value="" class="form-control" name="codigo" id="codigo" aria-describedby="helpId" style="margin: auto; width: 220px;">
                        <p><br></p>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label"><strong>Nueva Contraseña:</strong></label>
                        <p><br></p>
                        <input type="password" required value="" class="form-control" name="password" id="password" aria-describedby="helpId" style="margin: auto; width: 220px;">
                        <p><br></p>
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label"><strong>Confirme Contraseña:</strong></label>
                        <p><br></p>
                        <input type="password" required value="" class="form-control" name="conpassword" id="conpassword" aria-describedby="helpId" style="margin: auto; width: 220px;">
                        <p><br></p>
                    </div>
                    <div id="error" class="alert alert-danger ocultar" style="color:red;" role="alert">
                        Las Contraseñas no coinciden, vuelve a intentar.
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="boton" title="Recuperar Contraseña" value="Recuperar contraseña">
                        <input type="hidden" name="actualizar" id="actualizar" class="boton" value="true">
                    </div>
                </form>
            </div>
        </div>

        </div>
        <script>
            function quitar() {
                setTimeout(function() {
                    document.getElementById('errorcod').style.display = "none";
                }, 3000);

            }

            function verificarPasswords() {

                // Obtenemos los valores de los campos de contraseñas 
                pass1 = document.getElementById('password');
                pass2 = document.getElementById('conpassword');

                // Verificamos si las constraseñas no coinciden 
                if (pass1.value != pass2.value) {

                    // Si las constraseñas no coinciden mostramos un mensaje 
                    document.getElementById("error").classList.add("mostrar");

                    return false;
                } else {

                    // Si las contraseñas coinciden ocultamos el mensaje de error
                    document.getElementById("error").classList.remove("mostrar");

                    // Mostramos un mensaje mencionando que las Contraseñas coinciden 
                    document.getElementById("ok").classList.remove("ocultar");

                    // Desabilitamos el botón de login 
                    document.getElementById("login").disabled = true;

                    // Refrescamos la página (Simulación de envío del formulario) 
                    setTimeout(function() {
                        location.reload();
                    }, 3000);

                    return true;
                }

            }
        </script>
    </body>

</html>