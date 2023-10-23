<!DOCTYPE html>

<?php

require('conexion.php');
$ID_Producto = $_GET['id'];

$sql = "SELECT * FROM producto WHERE id_producto='$ID_Producto'";
$resultado = $mysqli->query($sql);
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
                        entradas</span></a></li>

            </li>
            <!--<li><a href="#tab4"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTOR</span></a></li>
			<li><a href="#tab5"><span class="fa fa-pagelines"></span><span class="tab-text">RANCHO</span></a></li>-->
        </ul>


        <div class="secciones">
            <article id="tab1">
                <h1>Ingresa los nuevos datos</h1>
                <form action="updateProducto.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id_producto']  ?>">

                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre del producto:"
                        value="<?php echo $row['nombre_producto']  ?>" required>
                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion:"
                        value="<?php echo $row['descripcion']  ?>" required>
                    <input type="text" class="form-control mb-3" name="existencias" placeholder="Existencias:"
                        value="<?php echo $row['existencias']  ?>" required>

                    <center>
                        <button type="submit" class="btn btn-danger btn-block mb-3">Actualizar</button>
                    </center>
                </form>
            </article>

        </div>
    </div>
</body>

</html>