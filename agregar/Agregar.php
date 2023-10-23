<!DOCTYPE html>

<?php
include("conexion.php");

$query = "SELECT * FROM proveedor";
$resultado = $mysqli->query($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>AGREGAR</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="stylesheet" href="estilos.css">

    <link rel="stylesheet" href="font-awesome.css">

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
                        <li><a href="#"><i class="fa fa-laptop"></i>IMPRESORA</a></li>
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
            <li><a href="#tab1"><span class="fa fa-universal-access"></span><span class="tab-text">AGREGAR</span></a>
            </li>
            <li><a href="#tab2"><span class="fa fa-user-circle"></span><span class="tab-text">PROVEEDORES</span></a>
            </li>
            <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTO</span></a></li>

        </ul>

        <div class="secciones">

            <center>

                <article id="tab1">
                    <h1>Seleccione cualquier opcion en el menu situado en la parte de arriba dependiendo lo que quiera
                        agregar</h1>


                </article>

                <article id="tab2">
                    <h1>AGREGAR PROVEEDOR</h1>
                    <p>
                    <fieldset>
                        <legend>Para agregar un nuevo proveedor llene el siguiente formulario</legend>
                        <br>
                        <form action="guardarProd.php" method="POST" autocomplete="off">
                            <div>
                                <label for="nombre">Nombre:</label>
                                <input id="nombre" type="text" name="nombre" required>
                            </div><br>
                            <div>
                                <label for="telefono"> Telefono:</label>
                                <input id="telefono" type="text" name="telefono" required>
                            </div><br>
                            <div>
                                <label for="direccion">Direccion:</label>
                                <input id="direccion" type="text" name="direccion" required>
                            </div><br>
                            <div>
                                Fecha Registro:
                                <input type="date" name="fecha" min="2010-12-31" max="2025-12-31" step="1" required />
                            </div><br>
                            <div>
                                <button type=""><img src="logobtn/regresar.jpg" height="20"
                                        width="30" /><br><b>Regresar</b></button>
                                <button type="submit"><img src="logobtn/guardar.jpg" height="20"
                                        width="30" /><br><b>Guardar</b></button>
                                <button><img src="logobtn/borrar.jpg" height="20"
                                        width="30" /><br><b>Borrar</b></button>
                            </div>
                        </form>
                    </fieldset>
                    </p>
                </article>
            </center>
            <center>
                <article id="tab3">
                    <h1>AGREGAR PRODUCTO</h1>
                    <p>
                    <fieldset>
                        <legend>Para agregar un nuevo productor llene el siguiente formulario</legend>
                        <br>
                        <form action="guardarProducto.php" method="POST" autocomplete="off">

                            <div>
                                <label for="producto">Producto:</label>
                                <input id="producto" type="text" name="nombre_producto" required>
                            </div><br>
                            <div>
                                <label for="descripcion">Descripcion:</label>
                                <input id="descripcion" type="text" name="descripcion" required>
                            </div><br>
                            <div>
                                <label for="existencia">Existencia:</label>
                                <input id="existencia" type="text" name="existencias" required>
                            </div><br>
                            <div>
                                <label for="existencia">Proveedor:</label>
                                <select class="" name="proveedor" required>
                                    <option selected> Seleccione el proveedor:</option>
                                    <?php while ($row = $resultado->fetch_assoc()) { ?>
                                    <option><?php echo $row['nombre']; ?></option>
                                    </tr>
                                    <?php } ?>
                                </select>
                            </div><br>
                            <div>
                                Fecha Registro:
                                <input type="date" name="fecha" min="2010-12-31" max="2025-12-31" step="1" required />
                            </div><br>
                            <div>
                                <button type=""><img src="logobtn/regresar.jpg" height="20"
                                        width="30" /><br><b>Regresar</b></button>
                                <button type="submit"><img src="logobtn/guardar.jpg" height="20"
                                        width="30" /><br><b>Guardar</b></button>
                                <button><img src="logobtn/borrar.jpg" height="20"
                                        width="30" /><br><b>Borrar</b></button>
                            </div>
                        </form>

                    </fieldset>
                    </p>
                </article>
            </center>
            <div>
                </fieldset>
                </p>
                </article>
                </center>
            </div>
        </div>
</body>

</html>