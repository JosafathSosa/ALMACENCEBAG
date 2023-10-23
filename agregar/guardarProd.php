<?php

require 'conexion.php';

$nombre = $mysqli->real_escape_string($_POST['nombre']);
$direccion = $mysqli->real_escape_string($_POST['direccion']);
$telefono = $mysqli->real_escape_string($_POST['telefono']);
$fecha = $mysqli->real_escape_string($_POST['fecha']);

$query = "INSERT INTO proveedor (nombre, telefono, direccion, fecha) VALUES ('$nombre', '$telefono', '$direccion', '$fecha')";

$res = $mysqli->query($query);

if ($res) {
    echo '
    <script>
    alert("Datos agregados correctamente");
    window.location.href = "Agregar.php";
    </script>';
}