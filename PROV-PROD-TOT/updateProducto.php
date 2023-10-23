<?php

require 'conexion.php';

$ID_Producto = $mysqli->real_escape_string($_POST['id']);
$nombre = $mysqli->real_escape_string($_POST['nombre']);
$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
$existencias = $mysqli->real_escape_string($_POST['existencias']);

$updateProducto = "UPDATE producto SET nombre_producto='$nombre', descripcion='$descripcion', existencias='$existencias' WHERE id_producto = '$ID_Producto'";
$resUpdate = $mysqli->query($updateProducto);

if ($resUpdate > 0) {
    echo '
    <script>
    alert("Datos modificados correctamente");
    window.location.href = "ppt.php";
    </script>';
}