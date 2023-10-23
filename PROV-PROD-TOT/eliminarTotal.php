<?php
require 'conexion.php';

$ID_Total = $_GET['id'];

$query = "DELETE FROM totales WHERE id_total = '$ID_Total'";
$res = $mysqli->query($query);

if ($res > 0) {
    echo '
    <script>
    alert("Datos eliminados correctamente");
    window.location.href = "ppt.php";
    </script>';
}