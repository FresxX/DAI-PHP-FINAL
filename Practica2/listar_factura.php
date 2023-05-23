<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Facturas</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/quela" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/qeinsha" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tt-rationalist-trl" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/royal-glamour" rel="stylesheet">
</head>
<body>
    <div id="admin-header">
        <h1>Barcos Admin</h1>
        <a href="cerrar_sesion.php" id="cerrar-sesion">Cerrar sesión</a>
    </div>
    <div id="admin-container">
        <div id="admin-menu">
            <a id="abox" href="listar.php">
                <div class="admin-box">
                    <h2>Usuarios</h2>
                </div>
            </a>
            <a id="abox" href="listar_embarcaciones.php">
                <div class="admin-box">
                    <h2>Embarcaciones</h2>
                </div>
            </a>
            <a id="abox" href="listar_repuestos.php">
                <div class="admin-box">
                    <h2>Repuestos</h2>
                </div>
            </a>
            <a id="abox" href="listar_factura.php">
            <div class="admin-box">
                <h2>Facturas</h2>
            </div>
</a>
        </div>
        <div id="tablabarcos">

            <form method="post" action="eliminar_facturas_lista.php">
                <table>
                    <tr>
                        <th>Número de Factura</th>
                        <th>Matrícula</th>
                        <th>Mano de Obra</th>
                        <th>Precio por Hora</th>
                        <th>Fecha de Emisión</th>
                        <th>Fecha de Pago</th>
                        <th>Base Imponible</th>
                        <th>IVA</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                    
                    <?php
                    include("conexionPDO.php");

                    $sql = "SELECT * FROM factura ORDER BY Numero_Factura";
                    $result = $conexion->query($sql);
                    $rows = $result->fetchAll();

                    foreach ($rows as $row) {
                        $numeroFactura = $row['Numero_Factura'];
                        $matricula = $row['Matricula'];
                        $manoDeObra = $row['Mano_de_Obra'];
                        $precioHora = $row['Precio_Hora'];
                        $fechaEmision = $row['Fecha_Emision'];
                        $fechaPago = $row['Fecha_Pago'];
                        $baseImponible = $row['Base_Imponible'];
                        $iva = $row['IVA'];
                        $total = $row['Total'];

                        echo "<tr>
                            <td><center><b>$numeroFactura</b></center></td>
                            <td>$matricula</td>
                            <td>$manoDeObra</td>
                            <td>$precioHora</td>
                            <td>$fechaEmision</td>
                            <td>$fechaPago</td>
                            <td>$baseImponible</td>
                            <td>$iva</td>
                            <td>$total</td>
                            <td><center><input type='checkbox' name='borrar[]' value='$numeroFactura'></center></td>
                            <td><center><a href='editar_factura.php?numeroFactura=$numeroFactura'>Editar</a></center></td>
                        </tr>";
                    }
                    ?>
                </table>

                <div class="botones">
                    <input type="submit" value="Eliminar facturas seleccionadas" id="eliminar">
                    <input type="reset" value="Deseleccionar Todos" id="deseleccion">
                </div>
            </form>
            <button id="introducir" onclick="window.location.href='introducir_factura.php';">Ir a introducir Facturas</button>
        </div>
    </div>
</body>
</html>
