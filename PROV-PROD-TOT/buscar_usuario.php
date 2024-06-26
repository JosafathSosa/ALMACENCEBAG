<!DOCTYPE html>

<?php
include "conexion.php";
$query = "SELECT * FROM producto";
$resultado = $mysqli->query($query);

$query = "SELECT * FROM proveedor";
$res = $mysqli->query($query);

$query = "SELECT * FROM totales";
$res2 = $mysqli->query($query);

/*$sql = "SELECT `totales`.`producto`,`totales`.`cantidad_inicio`, `totales`.`cantidad_salida`,`totales`.`existencia`,`totales`.`totales`,`entrada`.`fecha`, `proveedor`.`nombre`
FROM `entrada`
LEFT JOIN `proveedor` ON `entrada`.`id_proveedor` = `proveedor`.`id_proveedor`";
$resultado = mysqli_query($mysqli, $sql);*/
?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>ENTRADAS/SALIDAS</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://kit.fontawesome.com/5654adcfa3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    function confirmacion() {
        var res = confirm("¿Esta seguro de eliminar estos datos?");
        if (res == true) {
            return true;
        } else {
            return false;
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>

</head>

<body>
    <?php
$busqueda = strtolower($_REQUEST['busqueda']);
if (empty($busqueda)) {
    header("location: ppt.php");
}

$consutlaProvee = "SELECT * FROM proveedor WHERE nombre LIKE '%$busqueda%'";
$resProv = $mysqli->query($consutlaProvee);

$consultaProd = "SELECT * FROM producto WHERE nombre_producto LIKE '%$busqueda%'";
$resProd = $mysqli->query($consultaProd);

$consultaTotales = "SELECT * FROM totales WHERE producto LIKE '%$busqueda%'";
$resTot = $mysqli->query($consultaTotales);
?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../Almacen/Almacen.php">Rose Natural</a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../agregar/Agregar.php">Agregar</a>
                    <a class="nav-link" href="../ENT - SAL/entrada-salida.php">Registrar</a>
                    <a class="nav-link" href="../PROV-PROD-TOT/ppt.php">Totales</a>
                    <a class="nav-link" href="../registros/Registros.php">Registros</a>
                </div>
                <form action="buscar_usuario.php" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="text" name="busqueda" id="busqueda"
                        value="<?php echo $busqueda ?>" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="wrap">

        <ul class="tabs">

            <li><a href="#tab2"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTOS</span></a></li>
            <li><a href="#tab3"><span class="fa fa-minus-square"></span><span class="tab-text">PROVEDORES</span></a>
            </li>
            <li><a href="#tab4"><span class="fa fa-line-chart"></span><span class="tab-text">TOTALES</span></a></li>
        </ul>

        <div class="secciones">
            <center>
                <article id="tab2">
                    <h1>PRODUCTOS</h1>
                    <fieldset>
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-success table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th width="8%">ID PRODUCTO</th>
                                    <th width="16%">PRODUCTO</th>
                                    <th width="25%">DESCRIPCION</th>
                                    <th width="16%">EXISTENCIA</th>
                                    <th width="16%">MODIFICAR REGISTRO</th>
                                    <th width="16%">ELIMINAR REGISTRO</th>

                                </tr>
                            </thead>
                            <tbody><?php while ($row = $resProd->fetch_assoc()) {?>
                                <tr class="text-center">
                                    <td width="140" align="center">
                                        <?php echo $row['id_producto']; ?></td>
                                    <td align="center"><?php echo $row['nombre_producto']; ?></td>
                                    <td align="center"><?php echo $row['descripcion']; ?></td>
                                    <td align="center"><?php echo $row['existencias']; ?></td>
                                    <td><a href="actualizarProducto.php?id=<?php echo $row['id_producto'] ?>"
                                            class="btn btn-info">Editar</a>
                                    </td>
                                    <td>
                                        <form action="eliminarProducto.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $row['id_producto']; ?>">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirmacion();">Eliminar</button>
                                        </form>
                                    </td>

                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <a class="btn btn-danger">Reporte</a>
                    </fieldset>

                </article>
            </center>
            <center>
                <article id="tab3">

                    <h1>PROVEEDORES</h1>

                    <fieldset>


                        <table border="0" cellpadding="0" cellspacing="0" class="table table-success table-striped">

                            <thead>
                                <tr class="text-center">
                                    <th width="2%">ID PROVEEDOR</th>
                                    <th width="16%">PROVEEDOR</th>
                                    <th width="12%">TELEFONO</th>
                                    <th width="16%">DIRECCION</th>
                                    <th width="16%">FECHA REGISTRO</th>
                                    <th width="16%">MODIFICAR REGISTRO</th>
                                    <th width="16%">ELIMINAR REGISTRO</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resProv->fetch_assoc()) {?>
                                <tr class="text-center">
                                    <td width="140" align="center">
                                        <?php echo $row['id_proveedor']; ?></td>
                                    <td align="center"><?php echo $row['nombre']; ?></td>
                                    <td align="center"><?php echo $row['telefono']; ?></td>
                                    <td align="center"><?php echo $row['direccion']; ?></td>
                                    <td align="center"><?php echo $row['fecha']; ?></td>
                                    <td><a href="actualizarProveedores.php?id=<?php echo $row['id_proveedor'] ?>"
                                            class="btn btn-info">Editar</a>
                                    </td>
                                    <td>
                                        <form action="eliminarProveedor.php" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $row['id_proveedor']; ?>">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirmacion();">Eliminar</button>
                                        </form>
                                    </td>

                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                        <a class="btn btn-danger">Reporte</a>
                    </fieldset>

                </article>
            </center>
            <center>

                <article id="tab4">
                    <h1>TOTALES</h1>
                    <fieldset>
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-success table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th width="2%">PRODUCTOS</th>
                                    <th width="20%">CANTIDAD DE INICIO</th>
                                    <th width="16%">CANTIDAD DE SALIDA</th>
                                    <th width="12%">EXISTENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resTot->fetch_assoc()) {

    ?>
                                <tr class="text-center">

                                    <td align="center"><?php echo $row['producto']; ?></td>
                                    <td align="center"><?php echo $row['cantidad_inicio']; ?></td>
                                    <td align="center"><?php echo $row['cantidad_salida']; ?></td>
                                    <td align="center"><?php echo $row['existencia']; ?></td>


                                </tr>
                                <?php
}?>
                            </tbody>
                        </table>
                        <a class="btn btn-danger">Reporte</a>
                    </fieldset>

                </article>
            </center>
        </div>
    </div>
</body>

</html>