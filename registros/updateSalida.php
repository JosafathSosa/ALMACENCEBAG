<?php

require('conexion.php');

$id_salida = $_POST['id_salida'];
$fecha = $_POST['fecha'];
$entrega = $_POST['entrega'];
$recibe = $_POST['recibe'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

$sql = "UPDATE salida SET fecha='$fecha',entrega='$entrega',recibe='$recibe',producto='$producto',cantidad='$cantidad' WHERE id_salida='$id_salida'";
$resultado = $mysqli->query($sql);

$consultaDestino = "SELECT id_destino FROM salida WHERE id_salida = '$id_salida' ";
$res = $mysqli->query($consultaDestino);

$row = $res->fetch_assoc();

$id_des = $row['id_destino'];

$updateDestino = "UPDATE destino SET direccion='$direccion', telefono='$telefono' WHERE id_Destino='$id_des'";
$resUpdateDestino = $mysqli->query($updateDestino);

if ($resUpdateDestino > 0) {
    echo '
    <script>
    alert("Datos modificados correctamente");
    window.location.href = "Registros.php";
    </script>';
}