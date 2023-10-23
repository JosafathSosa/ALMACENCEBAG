<!DOCTYPE html>

<?php

require('conexion.php');
$ID_Salida = $_GET['id'];

$consultaSalida = "SELECT `salida`.`id_salida`,`salida`.`fecha`, `salida`.`entrega`,`salida`.`recibe`,`destino`.`direccion`,`destino`.`telefono`,`salida`.`producto`, `salida`.`cantidad` FROM `salida` LEFT JOIN `destino` ON `salida`.`id_destino` = `destino`.`id_Destino` WHERE `salida`.`id_salida` = '$ID_Salida'";
$resultado = $mysqli->query($consultaSalida);
$row = $resultado->fetch_assoc();


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
                        salidas</span></a></li>

            </li>
            <!--<li><a href="#tab4"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTOR</span></a></li>
			<li><a href="#tab5"><span class="fa fa-pagelines"></span><span class="tab-text">RANCHO</span></a></li>-->
        </ul>
        <div class="secciones">
            <article id="tab1">
                <h1>Ingresa los nuevos datos</h1>
                <form action="updateSalida.php" method="POST">
                    <input type="hidden" name="id_salida" value="<?php echo $row['id_salida']  ?>">
                    <input type="date" class="form-control mb-3" name="fecha" placeholder="Fecha:"
                        value="<?php echo $row['fecha']  ?>">
                    <input type="text" class="form-control mb-3" name="entrega" placeholder="entrega:"
                        value="<?php echo $row['entrega']  ?>">
                    <input type="text" class="form-control mb-3" name="recibe" placeholder="recibe:"
                        value="<?php echo $row['recibe']  ?>">
                    <input type="text" class="form-control mb-3" name="direccion" placeholder="cantidad:"
                        value="<?php echo $row['direccion']  ?>">
                    <input type="text" class="form-control mb-3" name="telefono" placeholder="cantidad:"
                        value="<?php echo $row['telefono']  ?>">
                    <input type="text" class="form-control mb-3" name="producto" placeholder="producto:"
                        value="<?php echo $row['producto']  ?>">
                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="producto:"
                        value="<?php echo $row['cantidad']  ?>">
                    <center>
                        <button type="submit" class="btn btn-danger btn-block mb-3">Actualizar</button>
                    </center>
                </form>
            </article>

        </div>
    </div>
</body>

</html>