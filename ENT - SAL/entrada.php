<!DOCTYPE html>

<?php
require "conexion.php";
$proveedor = $mysqli->real_escape_string($_POST['proveedor']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>ENTRADAS/SALIDAS</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="font-awesome.css">
    <script src="https://kit.fontawesome.com/5654adcfa3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../Almacen/Almacen.php">Rose Natural</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../agregar/Agregar.php">Agregar</a>
                    <a class="nav-link" href="../ENT - SAL/entrada-salida.php">Registrar</a>
                    <a class="nav-link" href="../PROV-PROD-TOT/ppt.php">Totales</a>
                    <a class="nav-link" href="../registros/Registros.php">Registros</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="wrap">
        <ul class="tabs">
            <li><a href="#tab2"><span class="fa fa-plus-square"></span><span class="tab-text">ENTRADAS</span></a></li>
        </ul>

        <div class="secciones">
            <article id="tab2">
                <div>
                    <h1>Agrega entrada de productos</h1>
                </div>
                <div>
                    <p>Para registrar una entrada de producto llena el siguiente formulario</p>
                </div>
                <form action="guardar_entrada.php" method="POST" autocomplete="off">
                    <div>
                        <label for="recibe">Recibe:</label>
                        <input id="recibe" name="recibe" type="text" placeholder="Quien recibe" required>
                    </div>
                    <div>
                        <label for="entrega">Entrega:</label>
                        <input id="entrega" name="entrega" type="text" placeholder="Quien entrega" required>
                    </div>
                    <div>
                        <label for="cantidad">Cantidad:</label>
                        <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad" required>
                    </div>
                    <div>
                        <label for="proveedor">Proveedor:</label>
                        <input id="proveedor" type="text" name="proveedor" value="<?php echo $proveedor; ?>">
                    </div>
                    <div>
                        <?php
$consultaProducto = "SELECT `producto`.`nombre_producto` FROM `producto` LEFT JOIN `proveedor` ON `producto`.`id_proveedor` = `proveedor`.`id_proveedor` WHERE nombre = '$proveedor'";
$res = $mysqli->query($consultaProducto);
?>
                        <label for="producto">Producto:</label>
                        <select id="producto" name="producto" required>
                            <option selected>Seleccione el producto:</option>
                            <?php while ($fila = $res->fetch_assoc()) {?>
                            <option><?php echo $fila['nombre_producto']; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div>
                        <label for="fecha">Fecha Entrada:</label>
                        <input id="fecha" name="fecha" type="date" min="2010-12-31" max="2025-12-31" step="1"
                            required />
                    </div>
                    <br>
                    <div class="bot">
                        <button type="button" class="btn btn-danger"
                            onclick="window.location.href='entrada-salida.php'">Atras</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
</body>

</html>