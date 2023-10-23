<?php

require('conexion.php');

$id_entrada = $_POST['id_entrada'];
$proveedor = $_POST['proveedor'];
$fecha = $_POST['fecha'];
$entrega = $_POST['entrega'];
$recibe = $_POST['recibe'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['producto'];

$consultaProve = "SELECT id_proveedor FROM proveedor WHERE nombre = '$proveedor'";
$res = $mysqli->query($consultaProve);
$row = $res->fetch_assoc();
$id_prov =  $row['id_proveedor'];

$sql = "UPDATE entrada SET fecha='$fecha',entrega='$entrega',recibe='$recibe',cantidad='$cantidad',id_proveedor='$id_prov',producto='$producto' WHERE id_entrada='$id_entrada'";
$resultado = $mysqli->query($sql);

if ($resultado > 0) {
    echo '
    <script>
    alert("Datos modificados correctamente");
    window.location.href = "Registros.php";
    </script>';
}