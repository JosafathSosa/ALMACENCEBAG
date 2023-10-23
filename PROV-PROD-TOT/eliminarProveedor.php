<?php

require 'conexion.php';

$ID_Proveedor = $_GET['id'];

$query = "DELETE FROM proveedor WHERE id_proveedor = '$ID_Proveedor'";
$res = $mysqli->query($query);

if ($res > 0) {
    echo '
    <script>
    alert("Datos eliminados correctamente");
    window.location.href = "ppt.php";
    </script>';
}