<!DOCTYPE html>

<?php
include "conexion.php";

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>REGISTROS</title>
    <link rel="stylesheet" href="estilos3.css">
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
    header("location: Registros.php");
}

$consutlaEntrada = "SELECT `entrada`.`id_entrada`,`entrada`.`producto`, `entrada`.`recibe`,`entrada`.`cantidad`,`entrada`.`entrega`,`entrada`.`fecha`, `proveedor`.`nombre` FROM `entrada` LEFT JOIN `proveedor` ON `entrada`.`id_proveedor` = `proveedor`.`id_proveedor` WHERE `entrada`.`producto` LIKE '%$busqueda%'";
$resultado = mysqli_query($mysqli, $consutlaEntrada);

$consultaSalida = "SELECT `salida`.`id_salida`,`salida`.`fecha`, `salida`.`entrega`,`salida`.`recibe`,`destino`.`direccion`,`destino`.`telefono`,`salida`.`producto`, `salida`.`cantidad` FROM `salida` LEFT JOIN `destino` ON `salida`.`id_destino` = `destino`.`id_Destino` WHERE `salida`.`producto` LIKE '%$busqueda%'";
$res = $mysqli->query($consultaSalida);

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
                    <input class="form-control me-2" type="text" name="busqueda" value="<?php echo $busqueda ?>"
                        id="busqueda" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="wrap">
        <ul class="tabs">

            <li><a href="#tab2"><span class="fa fa-plus-square"></span><span class="tab-text">R. ENTRADAS</span></a>
            </li>
            <li><a href="#tab3"><span class="fa fa-minus-square"></span><span class="tab-text">R. SALIDAS</span></a>
            </li>
        </ul>


        <div class="secciones">


            <center>
                <article id="tab2">
                    <div class="d-flex justify-content-between mb-3">
                        <h1 class="flex-grow-1">Registro de entradas</h1>

                    </div>
                    <p>
                    <p>
                    <table border="0" cellpadding="0" cellspacing="0" class="table table-success table-striped">
                        <tr class="text-center">
                            <th width="6%">ID</th>
                            <th width="10%">Proveedor</th>
                            <th width="10%">Producto</th>
                            <th width="10%">Recibe</th>
                            <th width="8%">Cantidad</th>
                            <th width="10%">Entrega</th>
                            <th width="10%"> Fecha</th>
                        </tr>
                        <tbody>
                            <?php
while ($row = mysqli_fetch_array($resultado)) {;?>
                            <tr class="text-center">
                                <td><?php echo $row['id_entrada']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['producto']; ?></td>
                                <td><?php echo $row['recibe']; ?></td>
                                <td><?php echo $row['cantidad']; ?></td>
                                <td><?php echo $row['entrega']; ?></td>
                                <td><?php echo $row['fecha']; ?></td>
                            </tr>
                        </tbody>
                        <?php }?>
                    </table>
                </article>
            </center>

            <center>
                <article id="tab3">
                    <div class="d-flex justify-content-between mb-3">
                        <h1 class="flex-grow-1">Registro de salidas</h1>

                    </div>
                    <p>
                    <p>
                    <fieldset>
                        <table class="table table-success table-striped">
                            <tr class="text-center">
                                <th width="6%">ID</th>
                                <th width="10%">Fecha</th>
                                <th width="10%">Entrega</th>
                                <th width="10%">Recibe</th>
                                <th width="8%">Destino</th>
                                <th width="8%">Telefono</th>
                                <th width="10%">Producto</th>
                                <th width="10%"> Cantidad</th>
                            </tr>
                            <tbody>
                                <?php
while ($fila = mysqli_fetch_array($res)) {;?>
                                <tr class="text-center">
                                    <td><?php echo $fila['id_salida']; ?></td>
                                    <td><?php echo $fila['fecha']; ?></td>
                                    <td><?php echo $fila['entrega']; ?></td>
                                    <td><?php echo $fila['recibe']; ?></td>
                                    <td><?php echo $fila['direccion']; ?></td>
                                    <td><?php echo $fila['telefono']; ?></td>
                                    <td><?php echo $fila['producto']; ?></td>
                                    <td><?php echo $fila['cantidad']; ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </fieldset>
                    </p>
                </article>
            </center>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>