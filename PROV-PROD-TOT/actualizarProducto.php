<!DOCTYPE html>

<?php

require 'conexion.php';
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
    <title>Modificar entrada</title>
    <link rel="stylesheet" href="estilos3.css">
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
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../agregar/Agregar.php">Agregar</a>
                    <a class="nav-link" href="../ENT - SAL/entrada-salida.php">Registrar</a>
                    <a class="nav-link" href="../PROV-PROD-TOT/ppt.php">Totales</a>
                    <a class="nav-link" href="../registros/Registros.php">Registros</a>
                </div>
                <form action="buscar_usuario.php" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="text" name="busqueda" id="busqueda"
                        placeholder="Busca productos" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="wrap">
        <div class="secciones">
            <article id="tab1">
                <h1>Ingresa los nuevos datos</h1>
                <form action="updateProducto.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id_producto'] ?>">
                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre del producto:"
                        value="<?php echo $row['nombre_producto'] ?>" required>
                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion:"
                        value="<?php echo $row['descripcion'] ?>" required>
                    <input type="text" class="form-control mb-3" name="existencias" placeholder="Existencias:"
                        value="<?php echo $row['existencias'] ?>" required>

                    <center>
                        <button type="submit" class="btn btn-success btn-block mb-3">Actualizar</button>
                    </center>
                </form>
            </article>

        </div>
    </div>
</body>

</html>