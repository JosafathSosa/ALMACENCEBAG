<!DOCTYPE html>

<?php
include("conexion.php");

$Proveedor = $mysqli->real_escape_string($_POST['proveedor']);

$query = "SELECT `producto`.`id_producto`,`producto`.`nombre_producto`, `producto`.`descripcion`,`proveedor`.`nombre`,`producto`.`existencias`,`producto`.`fecha` FROM `producto` LEFT JOIN `proveedor` ON `producto`.`id_proveedor` = `proveedor`.`id_proveedor` WHERE `proveedor`.`nombre` = '$Proveedor'";
$resultado = $mysqli->query($query);

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>ENTRADAS/SALIDAS</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>

</head>

<body>

    <div class="menu-cebag">
        <ul>

            <li><a href="../Almacen/Almacen.php"><i class="fa fa-home"></i>INICIO</a></li>

            <li><a href="../agregar/Agregar.php"><i class="fa fa-plus-square"></i>AGREGAR</a>
                <div class="sub-menu-1">
                    <ul>

                        <li><a href="../agregar/Agregar.php"><i class="fa fa-cart-plus"></i>PRODUCTO</a></li>
                        <li><a href="../agregar/Agregar.php"><i class="fa fa-male"></i>PROVEEDOR</a></li>


                    </ul>
                </div>
            </li>
            <li><a href="#"><i class="fa fa-cog"></i>AJUSTES</a>
                <div class="sub-menu-1">
                    <ul>

                        <li><a href="#"><i class="fa fa-user-plus"> </i>USUARIOS</a></li>
                        <li><a href="#"><i class="fa fa-wrench"></i>GENERAL</a></li>

                    </ul>
                </div>
            </li>
            <li>
                <div class="">
                    <form action="buscar_usuario.php" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="text" name="busqueda" id="busqueda" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </li>

            <li><a href="#"><i class="fa fa-bars"></i>PERFIL</a>
                <div class="sub-menu-1">
                    <ul>

                        <li><a href="#"><i class="fa fa-sign-out"> </i>SALIR</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
    <div class="wrap">

        <ul class="tabs">
            <li><a href="#tab2"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTOS</span></a></li>
        </ul>

        <div class="secciones">



            <center>

                <article id="tab2">

                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <a class="btn btn-success align-self-center" href="ppt.php">Regresar</a>
                        <h1 class="flex-grow-1">PRODUCTOS</h1>
                        <form action="reporteReportePorProveedor.php" method="POST">
                            <div class="me-2">
                                <label for="existencia">Por proveedor: <?php echo $Proveedor ?></label>
                                <input type="hidden" name="proveedor" value="<?php echo $Proveedor ?>">
                            </div>
                            <button class="btn btn-danger align-self-center" type="submit">Reporte</button>
                        </form>

                    </div>

                    <fieldset>
                        <table border="0" cellpadding="0" cellspacing="0" class="table table-success table-striped">

                            <thead>
                                <tr class="text-center">
                                    <th width="8%">ID PRODUCTO</th>
                                    <th width="16%">PRODUCTO</th>
                                    <th width="25%">DESCRIPCION</th>
                                    <th width="25%">PROVEEDOR</th>
                                    <th width="16%">EXISTENCIA</th>
                                    <th width="16%">FECHA REGISTRO</th>
                                    <th width="16%">MODIFICAR REGISTRO</th>
                                    <th width="16%">ELIMINAR REGISTRO</th>

                                </tr>
                            </thead>
                            <tbody><?php while ($row = $resultado->fetch_assoc()) { ?>
                                <tr class="text-center">
                                    <td width="140" align="center">
                                        <?php echo $row['id_producto']; ?></td>
                                    <td align="center"><?php echo $row['nombre_producto']; ?></td>
                                    <td align="center"><?php echo $row['descripcion']; ?></td>
                                    <td align="center"><?php echo $row['nombre']; ?></td>
                                    <td align="center"><?php echo $row['existencias']; ?></td>
                                    <td align="center"><?php echo $row['fecha']; ?></td>
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
                                <?php } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </article>
            </center>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>