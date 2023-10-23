<?php

require 'conexion.php';

$producto = $mysqli->real_escape_string($_POST['producto']);
$proveedor = $mysqli->real_escape_string($_POST['proveedor']);
$recibe = $mysqli->real_escape_string($_POST['recibe']);
$entrega = $mysqli->real_escape_string($_POST['entrega']);
$cantidad = $mysqli->real_escape_string($_POST['cantidad']); //Cantidad a aumentar existencias
$fecha = $mysqli->real_escape_string($_POST['fecha']);

$consultaProve = "SELECT id_proveedor FROM proveedor WHERE nombre = '$proveedor'";
$res = $mysqli->query($consultaProve);

$row = $res->fetch_assoc();

$id_prov =  $row['id_proveedor'];

$query = "INSERT INTO entrada (fecha, entrega, recibe, cantidad, id_proveedor, producto) VALUES ('$fecha', '$entrega', '$recibe', '$cantidad', '$id_prov', '$producto')";
$res = $mysqli->query($query);

$consultarExistencias = "SELECT existencias FROM producto WHERE nombre_producto = '$producto'";
$res3 = $mysqli->query($consultarExistencias);
$rowExistencias = $res3->fetch_assoc();
$existencias = $rowExistencias['existencias'];

$nuevaExistencia = $existencias + $cantidad;

$consultaTotal = "SELECT producto, cantidad_inicio FROM totales WHERE producto = '$producto'";
$resConsultaTotal = $mysqli->query($consultaTotal);
$rowConsultaCantidad = $resConsultaTotal->fetch_assoc();
$cantidad_inicio = $rowConsultaCantidad['cantidad_inicio'];

$cantidad_inicio_real = $cantidad_inicio + $cantidad;

//Si ya hay un producto creado con ese nombre solo se remplaza, sino se inserta
if ($resConsultaTotal->num_rows > 0) {
    $updateTotales = "UPDATE totales SET cantidad_inicio='$cantidad_inicio_real', existencia='$nuevaExistencia' WHERE producto='$producto'";
    $resUpdateTotal = $mysqli->query($updateTotales);
} else {
    $insertarTotales = "INSERT INTO totales (producto, cantidad_inicio, existencia) VALUES ('$producto', '$nuevaExistencia', '$nuevaExistencia')";
    $res2 = $mysqli->query($insertarTotales);
}

//Actualizo las existencias de la tabla producto
$updateExistencia = "UPDATE producto SET existencias='$nuevaExistencia' WHERE nombre_producto = '$producto'";
$res4 = $mysqli->query($updateExistencia);

if ($res4 > 0) {
    echo '
    <script>
    alert("Datos agregados correctamente");
    window.location.href = "entrada-salida.php";
    </script>';
}