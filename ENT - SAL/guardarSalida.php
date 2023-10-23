<?php

require 'conexion.php';

$producto = $mysqli->real_escape_string($_POST['producto']);
$recibe = $mysqli->real_escape_string($_POST['recibe']);
$entrega = $mysqli->real_escape_string($_POST['entrega']);
$cantidad = $mysqli->real_escape_string($_POST['cantidad']);
$destino = $mysqli->real_escape_string($_POST['destino']);
$fecha = $mysqli->real_escape_string($_POST['fecha']);
$direccion = $mysqli->real_escape_string($_POST['direccion']);
$telefono = $mysqli->real_escape_string($_POST['telefono']);

//Obtengo exitencias
$consultarExistencias = "SELECT existencias FROM producto WHERE nombre_producto = '$producto'";
$res3 = $mysqli->query($consultarExistencias);
$rowExistencias = $res3->fetch_assoc();
$existencias = $rowExistencias['existencias'];

if ($existencias - $cantidad > 0) {
    $consulta1 = "INSERT INTO destino (destino, direccion, telefono) VALUES ('$destino', '$direccion', '$telefono')";
    $res = $mysqli->query($consulta1);

    $consultaDestino = "SELECT MAX(id_Destino) AS id_destino FROM destino WHERE direccion = '$direccion'";
    $resultado = $mysqli->query($consultaDestino);

    $row = $resultado->fetch_assoc();

    $id = $row['id_destino'];

    $consulta3 = "INSERT INTO salida (fecha, entrega, recibe, id_destino, producto, cantidad) VALUES ('$fecha', '$entrega', '$recibe', '$id', '$producto', '$cantidad')";
    $res2 = $mysqli->query($consulta3);

    //Obtengo actual cantidad de salida
    $consultaTotal = "SELECT cantidad_salida FROM totales WHERE producto = '$producto'";
    $resConsultaTotal = $mysqli->query($consultaTotal);
    $rowConsultaCantidad = $resConsultaTotal->fetch_assoc();
    $cantidad_salida = $rowConsultaCantidad['cantidad_salida'];

    $cantidad_salida_real = $cantidad_salida + $cantidad;

    $totales = $existencias - $cantidad;

    //Si ya hay un producto creado con ese nombre solo se remplaza, sino se inserta
    if ($resConsultaTotal->num_rows > 0) {
        $updateTotales = "UPDATE totales SET cantidad_salida='$cantidad_salida_real', existencia='$totales' WHERE producto='$producto'";
        $resUpdateTotal = $mysqli->query($updateTotales);
    } else {
        $insertarTotales = "INSERT INTO totales (producto, cantidad_inicio, cantidad_salida, existencia) VALUES ('$producto', '$existencias', '$cantidad', '$totales')";
        $res2 = $mysqli->query($insertarTotales);
    }

    //Actualizo las existencias de la tabla producto
    $updateExistencia = "UPDATE producto SET existencias='$totales' WHERE nombre_producto = '$producto'";
    $res4 = $mysqli->query($updateExistencia);

    if ($res4 > 0) {
        echo '
    <script>
    alert("Datos agregados correctamente");
    window.location.href = "entrada-salida.php";
    </script>';
    }
} else {
    echo '
    <script>
    alert("No hay suficiente existencia, solo quedan ' . $existencias . '");
    window.location.href = "entrada-salida.php";
    </script>';
}