<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MENU ALMACEN</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome.css">
    <script src="https://kit.fontawesome.com/5654adcfa3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./Almacen.php">Rose Natural</a>
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

    <div class="buttonContainer">
        <!-- Aquí puedes agregar contenido para verificar que el div esté mostrando el fondo -->
        <div class="buttons">

            <div class="buttonProductoProveedor">
                <i class="fa-solid fa-shop fa-5x icon"></i>
                <a href="../agregar/Agregar.php">
                    <p class="text-entrada">AGREGAR PRODUCTO O PROVEEDOR</p>
                </a>
            </div>
            <div class="buttonEntrada">
                <i class="fa-solid fa-right-to-bracket fa-5x icon"></i>
                <a href="../ENT - SAL/entrada-salida.php">
                    <p class="text-entrada">REGISTRAR ENTRADA O SALIDA DE PRODUCTOS</p>
                </a>
            </div>
            <div class="buttonTotal">
                <i class="fa-solid fa-chart-simple fa-5x icon"></i>
                <a href="../PROV-PROD-TOT/ppt.php">
                    <p class="text-entrada">PRODUCTOS, PROVEEDORES Y TOTALES</p>
                </a>
            </div>
            <div class="buttonRegistros">
                <i class="fa-solid fa-calendar-days fa-5x icon"></i>
                <a href="../registros/Registros.php">
                    <p class="text-entrada">REGISTROS DE ENTRADAS Y SALIDAS</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>