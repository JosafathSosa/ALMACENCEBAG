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
            <li><a href="#tab1"><span class="fa fa-bars"></span><span class="tab-text">MENU</span></a></li>
            <li><a href="#tab2"><span class="fa fa-plus-square"></span><span class="tab-text">ENTRADAS</span></a></li>
            <li><a href="#tab3"><span class="fa fa-minus-square"></span><span class="tab-text">SALIDAS</span></a></li>

        </ul>


        <div class="secciones">
            <center>
                <article id="tab1">
                    <h1>Seleccione entrada o salida en el menu situado en la parte de arriba dependiendo lo que quiera
                        agregar </h1>

                </article>
            </center>
            <center>
                <article id="tab2">
                    <div class="">
                        <h1>AGREGAR ENTRADA DE PRODUCTOS</h1>
                    </div>
                    <div class="">
                        <legend>Para registrar una entrada de producto primero selecciona al proveedor</legend>
                    </div>
                    <!-- AQUI ESTA EL FORM PARA MANDAR -->
                    <form action="entrada.php" method="POST" class="container_form">
                        <div class="">
                            <i><b>
                                    <p style="color: black;"><big>PROVEEDOR:</big>
                                </b></i>
                            <select class="" name="proveedor" required>
                                <option selected> Seleccione el proveedor:</option>
                                <?php while ($row = $resultado->fetch_assoc()) {?>
                                <option><?php echo $row['nombre']; ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="">
                            <div class="bot">
                                <input class="btn btn-success" type="submit" value="Consultar">
                            </div>
                    </form>
                </article>
            </center>

            <center>
                <article id="tab3">
                    <form action="guardarSalida.php" autocomplete="off" method="POST">
                        <div class="">
                            <h1>AGREGAR SALIDA DE PRODUCTOS</h1>
                        </div>
                        <div class="">
                            <legend>Para registrar una salida de producto llene el siguiente formulario</legend>
                        </div>
                        <div class="">
                            <i><b>
                                    <p style="color: black;"><big>PRODUCTO</big>
                                </b></i>
                            <select class="" name="producto" required>

                                <option selected> Seleccione el producto:</option>

                                <?php while ($fila = $res2->fetch_assoc()) {?>
                                <option><?php echo $fila['nombre_producto']; ?></option>
                                </tr>
                                <?php }?>
                            </select>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>RECIBE:</big>
                                </b></i>
                            <input name="recibe" type="text" placeholder="Quien recibe" required></b></d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>ENTREGA:</big>
                                </b></i>
                            <input name="entrega" type="text" placeholder="Quien Entrega" required></b></d>
                        </div>

                        <div class="">

                            <i> <b>
                                    <p style="color:black;"><big>CANTIDAD:</big>
                                </b> </i>
                            <input name="cantidad" type="number" placeholder="#" required></b>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>DESTINO:</big>
                                </b></i>
                            <input name="destino" type="text" placeholder="Destino" required></b></d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>DIRECCION:</big>
                                </b></i>
                            <input name="direccion" type="text" placeholder="Direccion" required></b></d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>TELEFONO:</big>
                                </b></i>
                            <input name="telefono" type="text" placeholder="Telefono" required></b></d>
                        </div>
                        <div class="">
                            <i> <b>
                                    <p style="color:black;"><big>FECHA SALIDA:</big>
                                </b></i>
                            <input name="fecha" type="date" class="container__input" min="2010-12-31" max="2025-12-31"
                                step="1" / required>
                        </div>
                        <div class="">
                            <div class="bot">

                                <input class="btn btn-success" type="submit" value="Guardar">

                            </div>
                    </form>
                </article>
            </center>
        </div>
    </div>
</body>

</html>