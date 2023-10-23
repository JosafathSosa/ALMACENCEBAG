<!DOCTYPE html>

<?php

require('conexion.php');
$ID_Entrada = $_GET['id'];

$sql = "SELECT * FROM entrada WHERE id_entrada='$ID_Entrada'";
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_assoc();

$query = "SELECT * FROM proveedor";
$res = $mysqli->query($query);

$consultaProv = "SELECT id_proveedor FROM entrada WHERE id_entrada = '$ID_Entrada'";
$resProvedor = $mysqli->query($consultaProv);
$fila = $resProvedor->fetch_assoc();
$id_prov = $fila['id_proveedor'];

$consultaNombreProveedor = "SELECT nombre FROM proveedor WHERE id_proveedor = '$id_prov'";
$resultadoConsultaNombreProveedor = $mysqli->query($consultaNombreProveedor);
$fila2 = $resultadoConsultaNombreProveedor->fetch_assoc();
$nombreProveedor = $fila2['nombre'];


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>REGISTROS</title>
    <link rel="stylesheet" href="estilos3.css">
    <link rel="stylesheet" href="font-awesome.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <div class="wrap">
        <ul class="tabs">
            <li><a href="#tab1"><span class="fa fa-file-text"></span><span class="tab-text">Modificar
                        entradas</span></a></li>

            </li>
            <!--<li><a href="#tab4"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTOR</span></a></li>
			<li><a href="#tab5"><span class="fa fa-pagelines"></span><span class="tab-text">RANCHO</span></a></li>-->
        </ul>


        <div class="secciones">
            <article id="tab1">
                <h1>Ingresa los nuevos datos</h1>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id_entrada" value="<?php echo $row['id_entrada']  ?>">
                    <select name="proveedor" required>
                        <option selected><?php echo $nombreProveedor; ?></option>
                        <?php while ($fila = $res->fetch_assoc()) { ?>
                        <option><?php echo $fila['nombre']; ?></option>
                        </tr>
                        <?php } ?>
                    </select>
                    <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha:"
                        value="<?php echo $row['fecha']  ?>" required>
                    <input type="text" class="form-control mb-3" name="entrega" placeholder="entrega:"
                        value="<?php echo $row['entrega']  ?>" required>
                    <input type="text" class="form-control mb-3" name="recibe" placeholder="recibe:"
                        value="<?php echo $row['recibe']  ?>" required>
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="cantidad:"
                        value="<?php echo $row['cantidad']  ?>" required>
                    <input type="text" class="form-control mb-3" name="producto" placeholder="producto:"
                        value="<?php echo $row['producto']  ?>" required>
                    <center>
                        <button type="submit" class="btn btn-danger btn-block mb-3">Actualizar</button>
                    </center>
                </form>
            </article>

        </div>
    </div>
</body>

</html>