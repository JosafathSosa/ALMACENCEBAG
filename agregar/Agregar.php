<!DOCTYPE html>

<?php
include "conexion.php";

$query = "SELECT * FROM proveedor";
$resultado = $mysqli->query($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Agregar</title>
    <link rel="stylesheet" href="estilos1.css">
    <link rel="stylesheet" href="font-awesome.css">
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
            <h3>Seleccione cualquier opción en el menu dependiendo lo que quiera
                agregar</h3>
        </div>

        <ul class="tabs">
            </li>
            <li><a href="#tab2"><span class="fa fa-user-circle"></span><span class="tab-text">PROVEEDORES</span></a>
            </li>
            <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">PRODUCTO</span></a></li>
        </ul>

        <div class="secciones">

            <article id="tab2">
                <h1>Agregar proveedor</h1>
                <p>Para agregar un nuevo proveedor llene el siguiente formulario:</p>
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
                        <label for="direccion">Dirección:</label>
                        <input id="direccion" type="text" name="direccion" required>
                    </div><br>
                    <div>
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" min="2010-12-31" max="2025-12-31" step="1"
                            required />
                    </div><br>
                    <div>
                        <button type="submit" class="btn btn-success">Agregar proveedor</button>
                    </div>
                </form>
            </article>

            <article id="tab3">
                <h1>Agregar producto</h1>
                <p>Para agregar un nuevo producto llene el siguiente formulario:</p>

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
                        <input id="existencia" type="number" name="existencias" required>
                    </div><br>
                    <div>
                        <label for="existencia">Proveedor:</label>
                        <select class="" name="proveedor" required>
                            <option selected> Seleccione el proveedor:</option>
                            <?php while ($row = $resultado->fetch_assoc()) {?>
                            <option><?php echo $row['nombre']; ?></option>
                            </tr>
                            <?php }?>
                        </select>
                    </div><br>
                    <div>
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" min="2010-12-31" max="2025-12-31" step="1"
                            required />
                    </div><br>
                    <div>
                        <button type="submit" class="btn btn-success">Agregar producto</button>
                    </div>
                </form>
            </article>
        </div>
</body>

</html>