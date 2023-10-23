<?php

require 'conexion.php';

$ID_Producto = $_GET['id'];

$consultaProd = "SELECT nombre_producto FROM producto WHERE id_producto = '$ID_Producto'";
$resConsultaProd = $mysqli->query($consultaProd);
$row = $resConsultaProd->fetch_assoc();
$nombre = $row['nombre_producto'];

$consultaDeleteProd = "DELETE FROM producto WHERE id_producto = '$ID_Producto'";
$res = $mysqli->query($consultaDeleteProd);

$consultaDeleteTot = "DELETE FROM totales WHERE producto = '$nombre'";
$res2 = $mysqli->query($consultaDeleteTot);

$consultaDeleteEntrada = "DELETE FROM entrada WHERE producto = '$nombre'";
$res3 = $mysqli->query($consultaDeleteEntrada);

$queryIdDestino = "SELECT id_destino FROM salida WHERE producto = '$nombre'";
$resConsultaIdDestino = $mysqli->query($queryIdDestino);

$dir = array();
$cont = 0;
while ($rowDestino = $resConsultaIdDestino->fetch_array()) {
    $dir[$cont] = $rowDestino['id_destino'];

    $queryDeleteDestino = "DELETE FROM destino WHERE id_Destino = '$dir[$cont]'";
    $res4 = $mysqli->query($queryDeleteDestino);
    $cont++;
}

if ($res4 > 0 || $res > 0) {
    echo '<script>
alert("Dato eliminado correctamente");
 window.location.href = "ppt.php";
</script>';
}