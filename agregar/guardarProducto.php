<?php

require 'conexion.php';

$producto = $mysqli->real_escape_string($_POST['nombre_producto']);
$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
$existencias = $mysqli->real_escape_string($_POST['existencias']);
$nombre_proveedor = $mysqli->real_escape_string($_POST['proveedor']);
$fecha = $mysqli->real_escape_string($_POST['fecha']);

$consultaIdProveedor = "SELECT id_proveedor FROM proveedor WHERE nombre = '$nombre_proveedor'";
$res2 = $mysqli->query($consultaIdProveedor);
$row = $res2->fetch_assoc();

$id_proveedor = $row['id_proveedor'];

$query = "INSERT INTO producto (nombre_producto, descripcion, id_proveedor, existencias, fecha) VALUES ('$producto', '$descripcion', '$id_proveedor', '$existencias', '$fecha')";
$res = $mysqli->query($query);

if ($res) {
    echo '
    <script>
    alert("Datos agregados correctamente");
    window.location.href = "Agregar.php";
    </script>';
}