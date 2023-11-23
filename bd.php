<!-- Conexión Base de Datos -->
<?php

$servidor = "localhost";
$baseDeDatos = "kahwa";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos", $usuario, $contrasenia);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>