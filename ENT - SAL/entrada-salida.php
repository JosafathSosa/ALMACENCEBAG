<!DOCTYPE html>

<?php
require "conexion.php";
$query = "SELECT * FROM proveedor";
$resultado = $mysqli->query($query);

$consultaProducto = "SELECT * FROM producto ORDER BY nombre_producto ASC";
$res2 = $mysqli->query($consultaProducto);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Entradas y salidas</title>
    <link rel="stylesheet" href="estilos1.css">
    <script src="https://kit.fontawesome.com/5654adcfa3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
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
        <div class="mensaje">
            <h3>Seleccione cualquier opción en el menú dependiendo de lo que quiera agregar</h3>
        </div>
        <ul class="tabs">
            <li><a href="#tab2"><span class="fa fa-plus-square"></span><span class="tab-text">ENTRADAS</span></a></li>
            <li><a href="#tab3"><span class="fa fa-minus-square"></span><span class="tab-text">SALIDAS</span></a></li>
        </ul>
        <div class="secciones">

            <article id="tab2">
                <div>
                    <h1>Agregar entrada de productos</h1>
                </div>
                <div>
                    <p>Para registrar una entrada de producto primero selecciona al proveedor:</p>
                </div>
                <!-- AQUI ESTA EL FORM PARA MANDAR -->
                <form action="entrada.php" method="POST">
                    <div>

                        <select id="proveedor" name="proveedor" required>
                            <option value="" selected disabled>Seleccione el proveedor:</option>
                            <?php while ($row = $resultado->fetch_assoc()) {?>
                            <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="bot">
                        <input class="btn btn-success" type="submit" value="Consultar">
                    </div>
                </form>
            </article>

            <article id="tab3">
                <form action="guardarSalida.php" autocomplete="off" method="POST">
                    <div>
                        <h1>Agrega salida de productos</h1>
                    </div>
                    <div>
                        <p>Para registrar una salida de producto llene el siguiente formulario:</p>
                    </div>
                    <div>
                        <label for="producto">Producto:</label>
                        <select id="producto" name="producto" required>
                            <option selected>Seleccione el producto:</option>
                            <?php while ($fila = $res2->fetch_assoc()) {?>
                            <option><?php echo $fila['nombre_producto']; ?></option>
                            <?php }?>
                        </select>
                    </div>
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
                        <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad en número" required>
                    </div>
                    <div>
                        <label for="destino">Destino:</label>
                        <input id="destino" name="destino" type="text" placeholder="Destino" required>
                    </div>
                    <div>
                        <label for="direccion">Dirección:</label>
                        <input id="direccion" name="direccion" type="text" placeholder="Dirección" required>
                    </div>
                    <div>
                        <label for="telefono">Teléfono:</label>
                        <input id="telefono" name="telefono" type="text" placeholder="Teléfono" required>
                    </div>
                    <div>
                        <label for="fecha">Fecha Salida:</label>
                        <input id="fecha" name="fecha" type="date" min="2010-12-31" max="2025-12-31" step="1" required>
                    </div>
                    <br>
                    <div class="bot">
                        <input class="btn btn-success" type="submit" value="Guardar">
                    </div>
                </form>
            </article>

        </div>
    </div>
</body>

</html>