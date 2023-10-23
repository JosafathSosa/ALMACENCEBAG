<?php

require 'conexion.php';

$ID_Proveedor = $mysqli->real_escape_string($_POST['id']);
$Nombre = $mysqli->real_escape_string($_POST['nombre']);
$Telefono = $mysqli->real_escape_string($_POST['telefono']);
$Direccion = $mysqli->real_escape_string($_POST['direccion']);
$Fecha = $mysqli->real_escape_string($_POST['fecha']);

$updateProducto = "UPDATE proveedor SET nombre='$Nombre', telefono='$Telefono', direccion='$Direccion', fecha='$Fecha' WHERE id_proveedor = '$ID_Proveedor'";
$resUpdate = $mysqli->query($updateProducto);

if ($resUpdate > 0) {
    echo '
    <script>
    alert("Datos modificados correctamente");
    window.location.href = "ppt.php";
    </script>';
}