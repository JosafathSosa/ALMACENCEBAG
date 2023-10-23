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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <script src="main.js"></script>
    <title>Document</title>
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
            <li><a href="#tab2"><span class="fa fa-plus-square"></span><span class="tab-text">ENTRADAS</span></a></li>
        </ul>

        <div class="secciones">
            <center>
                <article class="tab2">
                    <div class="">
                        <h1>AGREGAR ENTRADA DE PRODUCTOS</h1>
                    </div>
                    <div class="">
                        <legend>Para registrar una entrada de producto llena el siguiente formulario</legend>
                    </div>
                    <form action="guardar_entrada.php" method="POST" class="container_form">
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>RECIBE:</big>
                                </b></i>
                            <input name="recibe" type="text" placeholder="Quien recibe" required></b>
                            </d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>ENTREGA:</big>
                                </b></i>
                            <input name="entrega" type="text" placeholder="Quien entrega" required></b>
                            </d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>CANTIDAD:</big>
                                </b> </i>
                            <input name="cantidad" type="text" placeholder="#" required></b>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>PROVEEDOR:</big>
                                </b> </i>
                            <input type="text" name="proveedor" value="<?php echo $proveedor; ?>">
                        </div>
                        <div class="">
                            <?php

$consultaProducto = "SELECT `producto`.`nombre_producto` FROM `producto` LEFT JOIN `proveedor` ON `producto`.`id_proveedor` = `proveedor`.`id_proveedor` WHERE nombre = '$proveedor'";
$res = $mysqli->query($consultaProducto);
?>
                            <i><b>
                                    <p style="color: black;"><big>PRODUCTO</big>
                                </b></i>
                            <select class="" name="producto" required>
                                <option selected> Seleccione el producto:</option>
                                <?php while ($fila = $res->fetch_assoc()) {?>
                                <option><?php echo $fila['nombre_producto']; ?></option>
                                </tr>
                                <?php }?>
                            </select>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>FECHA ENTRADA:</big>
                                </b></i>
                            <input name="fecha" type="date" class="container__input" min="2010-12-31" max="2025-12-31"
                                step="1" required />
                        </div>
                        <br>
                        <div class="">
                            <div class="bot">
                                <a class="btn btn-danger" href="entrada-salida.php">Atras</a>
                                <input class="btn btn-success" type="submit" value="Guardar">

                            </div>
                    </form>
                </article>
            </center>
        </div>
    </div>
</body>

</html>