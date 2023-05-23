<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista repuestos</title>
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

        <form method="post" action="eliminar_repuestos_lista.php">
    <table>
        <tr>
            <th>Referencia</th>
            <th>Descripción</th>
            <th>Importe</th>
            <th>Ganancia</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>

        <?php
        include("conexionPDO.php");
        include("eliminar_temporales.php");

        // Definimos la cadena de la consulta
        $sql = "SELECT * FROM repuestos ORDER BY Referencia";
        // Creamos la consulta y asignamos el resultado a la variable $result
        $result = $conexion->query($sql);
        // Extraemos los valores de $result
        $rows = $result->fetchAll();

        // Como los valores están en un array asociativo, usamos foreach para extraer los valores de $rows
        foreach ($rows as $row) {
            $referencia = $row['Referencia'];
            $descripcion = $row['Descripcion'];
            $importe = $row['Importe'];
            $ganancia = $row['Ganancia'];

            echo "<tr>
                <td><center><b>$referencia</b></center></td>
                <td>$descripcion</td>
                <td>$importe</td>
                <td>$ganancia</td>
                <td><center><input type='checkbox' name='borrar[]' value='$referencia'></center></td>
                <td><center><a href='editar_repuesto.php?referencia=$referencia'>Editar</a></center></td>
            </tr>";
        }
        ?>

    </table>

    <div class="botones">
        <input type="submit" value="Eliminar repuestos seleccionados" id="eliminar">
        <input type="reset" value="Deseleccionar Todos" id="deseleccion">
    </div>
</form>

<button id="introducir" onclick="window.location.href='introducir_repuesto.php';">Ir a introducir Repuestos</button>

</html>
