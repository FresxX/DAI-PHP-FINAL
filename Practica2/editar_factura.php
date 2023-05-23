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
        <?php
        include("conexionPDO.php");

        $numeroFactura = $_GET['numeroFactura'];
        $sql = "SELECT * FROM factura WHERE Numero_Factura = '$numeroFactura'";
        $result = $conexion->query($sql);
        $rows = $result->fetchAll();

        $numeroFacturaToDelete = ""; // Variable para almacenar el número de factura

        $base = 0;
        $iva1 = 0;

        foreach ($rows as $row) {
            $numeroFactura = $row['Numero_Factura'];
            $matricula = $row['Matricula'];
            $manoDeObra = $row['Mano_de_Obra'];
            $precioHora = $row['Precio_Hora'];
            $fechaEmision = $row['Fecha_Emision'];
            $fechaPago = $row['Fecha_Pago'];
            $baseImponible = $row['Base_Imponible'];
            $base = $baseImponible;
            $iva = $row['IVA'];
            $iva1 = $iva;
            $total = $row['Total'];
            
            // Mostrar el formulario de edición para esta factura
            echo "
                <form action='editar_registro_factura.php' method='post'>
                    <table>
                        <tr>
                            <td>Número de Factura:</td>
                            <td><input type='text' name='numero_factura' value='$numeroFactura'></td>
                        </tr>
                        <tr>
                            <td>Matrícula:</td>
                            <td><input type='text' name='matricula' value='$matricula'></td>
                        </tr>
                        <tr>
                            <td>Mano de Obra:</td>
                            <td><input type='text' name='mano_de_obra' value='$manoDeObra'></td>
                        </tr>
                        <tr>
                            <td>Precio por Hora:</td>
                            <td><input type='text' name='precio_hora' value='$precioHora'></td>
                        </tr>
                        <tr>
                            <td>Fecha de Emisión:</td>
                            <td><input type='text' name='fecha_emision' value='$fechaEmision'></td>
                        </tr>
                        <tr>
                            <td>Fecha de Pago:</td>
                            <td><input type='text' name='fecha_pago' value='$fechaPago'></td>
                        </tr>
                        <tr>
                            <td>Base Imponible:</td>
                            <td><input type='text' name='base_imponible' value='$baseImponible'></td>
                        </tr>
                        <tr>
                            <td>IVA:</td>
                            <td><input type='text' name='iva' value='$iva'></td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td><input type='text' name='total' value='$total'></td>
                        </tr>
                    </table>
                    <input type='submit' value='Guardar cambios'>
                </form>";
            
            $numeroFacturaToDelete = $numeroFactura; // Asignar el número de factura a la variable
        }
        ?>
        </div>
        
        <form method="post" action="eliminar_detalle_factura.php">
            <input type="hidden" name="id" value="<?php echo $numeroFacturaToDelete; ?>">
            <button type="submit">Borrar factura</button>
        </form>
        
        <h2>Registro de Detalle de Factura</h2>
        <form method="post" action="introducir_detalle_factura2.php">

            <label for="numero_factura">Número de Factura:</label>
            <input type="text" id="numero_factura" name="numero_factura" value="<?php echo $numeroFacturaToDelete; ?>" readonly><br><br>

            <label for="referencia">Referencia:</label>
            <?php
            // Definimos la cadena de la consulta
            $sql_repuestos = "SELECT Referencia, Descripcion FROM repuestos";
            // Creamos la consulta y asignamos el resultado a la variable $result
            $result_repuestos = $conexion->query($sql_repuestos);
            // Extraemos los valores de $result
            $repuestos = $result_repuestos->fetchAll();

            // Generar el select con las referencias y descripciones de los repuestos
            echo "<select id='referencia' name='referencia' required>";
            foreach ($repuestos as $repuesto) {
                $referencia = $repuesto['Referencia'];
                $descripcion = $repuesto['Descripcion'];
                echo "<option value='$referencia'>$referencia - $descripcion</option>";
            }
            echo "</select>";
            ?>
            <br><br>

            <label for="unidades">Unidades:</label>
            <input type="text" id="unidades" name="unidades" required><br><br>
            <input type="hidden" name="base" value="<?php echo $base; ?>">
            <input type="hidden" name="iva1" value="<?php echo $iva1; ?>">
            <input type="hidden" name="numeroFacturaToDelete" value="<?php echo $numeroFacturaToDelete; ?>">
            <input type="submit" id="eliminar-todo" value="Introducir Detalle de Factura">


            <input type="reset" id="eliminar-todo" value="Borrar">
        </form>
    </div>
</body>
</html>
