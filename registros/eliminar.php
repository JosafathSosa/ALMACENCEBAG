<?php

require 'conexion.php';

$id_entrada = $_GET['id'];

$consultaEliminarEntrada =  "DELETE FROM entrada WHERE id_entrada = '$id_entrada'";
$resConsulta = $mysqli->query($consultaEliminarEntrada);

if ($resConsulta > 0) {

    echo '
        <script>
        alert("Datos eliminados correctamente");
        window.location.href = "Registros.php";
        </script>';
}