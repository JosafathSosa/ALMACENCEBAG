<?php

require 'conexion.php';

$id_salida = $_GET['id'];

$consultaDestino = "SELECT id_destino FROM salida WHERE id_salida = '$id_salida'";
$resConsultaDestino = $mysqli->query($consultaDestino);
$rowConsultaDestino = $resConsultaDestino->fetch_assoc();
$id_destino = $rowConsultaDestino['id_destino'];

$eliminarDestino = "DELETE FROM destino WHERE id_Destino = '$id_destino'";
$resConEliDestino = $mysqli->query($eliminarDestino);

if ($resConEliDestino > 0) {
    echo '
        <script>
        alert("Datos eliminados correctamente");
        window.location.href = "Registros.php";
        </script>';
}