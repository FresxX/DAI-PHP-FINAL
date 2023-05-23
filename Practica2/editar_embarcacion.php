<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar embarcación</title>
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

            $matricula = $_GET['matricula'];
            $sql = "SELECT * FROM embarcaciones WHERE Matricula = '$matricula'";
            $result = $conexion->query($sql);
            $rows = $result->fetchAll();

            foreach ($rows as $row) {
              $matricula = $row['Matricula'];
              $longitud = $row['Longitud'];
              $potencia = $row['Potencia'];
              $motor = $row['Motor'];
              $anio = $row['Año'];
              $color = $row['Color'];
              $material = $row['Material'];
              $id_cliente = $row['Id_Cliente'];

              // Mostrar el formulario de edición para esta embarcación
              echo "
                <form action='editar_registro_embarcacion.php' method='post'>
                    <table>
                        <tr>
                            <td>Matrícula:</td>
                            <td><input type='text' name='matricula' value='$matricula'></td>
                        </tr>
                        <tr>
                            <td>Longitud:</td>
                            <td><input type='text' name='longitud' value='$longitud'></td>
                        </tr>
                        <tr>
                            <td>Potencia:</td>
                            <td><input type='text' name='potencia' value='$potencia'></td>
                        </tr>
                        <tr>
                            <td>Motor:</td>
                            <td><input type='text' name='motor' value='$motor'></td>
                        </tr>
                        <tr>
                            <td>Año:</td>
                            <td><input type='text' name='anio' value='$anio'></td>
                        </tr>
                        <tr>
                            <td>Color:</td>
                            <td><input type='text' name='color' value='$color'></td>
                        </tr>
                        <tr>
                            <td>Material:</td>
                            <td><input type='text' name='material' value='$material'></td>
                        </tr>
                        <tr>
                            <td>Id Cliente:</td>
                            <td><input type='text' name='id_cliente' value='$id_cliente'></td>
                        </tr>
                    </table>
                    <input type='submit' value='Guardar cambios'>
                </form>";

              // Botón de eliminar
              echo "
                <form action='eliminar_detalle_embarcacion.php' method='post'>
                    <input type='hidden' name='matricula' value='$matricula'>
                    <input type='submit' value='Eliminar embarcación'>
                </form>";
            }
            ?>

        </div>
    </div>
</body>
</html>
