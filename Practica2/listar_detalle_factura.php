<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista clientes</title>
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
            <h2>Lista Detalles Factura</h2>
            <form method="post" action="eliminar_clientes_lista.php">
                <table>
                    <tr>
                        <th>Id_Det_Factura</th>
                        <th>Numero_Factura</th>
                        <th>Referencia</th>
                        <th>Unidades</th>
                    </tr>

                    <?php
                    include("conexionPDO.php");

                    $sql = "SELECT * FROM detalle_factura";
                    $result = $conexion->query($sql);
                    $rows = $result->fetchAll();

                    foreach ($rows as $row) {
                        $idDetFactura = $row['Id_Det_Factura'];
                        $numeroFactura = $row['Numero_Factura'];
                        $referencia = $row['Referencia'];
                        $unidades = $row['Unidades'];

                        echo "<tr>
                            <td><center><b>$idDetFactura</b></center></td>
                            <td>$numeroFactura</td>
                            <td>$referencia</td>
                            <td>$unidades</td>
                            <td><center><input type='checkbox' name='borrar[]' value='$idDetFactura'></center></td>
                            <td><center><a href='editar_detalle.php?idDetFactura=$idDetFactura'>Editar</a></center></td>
                            <td><center><a href='eliminar_detalle_factura2.php?idDetFactura=$idDetFactura'>Eliminar</a></center></td>
                        </tr>";
                    }
                    ?>

                </table>
            </form>
            <a href="introducir_detalle_factura.php" id="introducir">Introducir Detalles de Factura</a>
        </div>
    </div>
</body>
</html>
