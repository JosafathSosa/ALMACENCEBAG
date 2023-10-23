<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MENU ALMACEN</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">

</head>

<body>

    <div class="menu-cebag">
        <ul>

            <li><a href="#"><i class="fa fa-home"></i>INICIO</a></li>

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
    <br>
    <center>
        <div class="cebag">ALMACEN</div>
        <div class="botones-container">
            <div class="botones-arriba">

                <br>
                <a href="../ENT - SAL/entrada-salida.php">
                    <button><img src="img/entrada.jpg" height="95"
                            width="160" /><br><big><b>ENTRADAS</b></big><br><i>Hacer
                            el
                            reporte de </i><br><i>entrada de cualquiera</i><br><i> de los productos</i><br><i>
                            ofertados</i></br></button>
                </a>
                <a href="../PROV-PROD-TOT/ppt.php">
                    <button><img src="img/proveedores.jpg" height="95"
                            width="160" /><br><big><b>PROVEEDORES</b></big><br><i>Ver
                            los
                            proveedores </i><br><i>de cada entrada</i><br><i>y salida de los</i><br><i>
                            producto</i></br></button>
                </a>
                <a href="../PROV-PROD-TOT/ppt.php">
                    <button><img src="img/productos.jpg" height="95"
                            width="160" /><br><big><b>PRODUCTOS</b></big><br><i>Ver
                            los
                            productos </i><br><i>de cada entrada</i><br><i>y salida de los</i><br><i>
                            producto</i></br></button>
                </a>
            </div>


            <br>
            <a href="../ENT - SAL/entrada-salida.php">
                <button><img src="img/salida.jpg" height="95" width="160" /><br><big><b>SALIDAS</b></big><br><i>Hacer el
                        reporte
                        de </i><br><i>salida de cualquiera</i><br><i> de los productos</i><br><i>
                        ofertados</i></br></button>
            </a>


            <a href="../registros/Registros.php">
                <button><img src="img/reportes.jpg" height="95" width="160" /><br><big><b>TOTALES</b></big><br><i>Ver
                        los
                        totales </i><br><i>de cada entrada</i><br><i>y salida de los</i><br><i>
                        producto</i></br></button>
            </a>


        </div>
    </center>

    </div>
</body>

</html>