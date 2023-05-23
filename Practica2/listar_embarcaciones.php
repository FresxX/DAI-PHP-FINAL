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
        <a id="abox" href="listar_factura.php">
            <div class="admin-box">
                <h2>Facturas</h2>
            </div>
            </a>
            <a id="abox" href="listar_detallefactura.php">
            <div class="admin-box">
                <h2>Facturas</h2>
            </div>
            </a>
</div>
        <div id="tablabarcos">

<form method="post" action="eliminar_embarcaciones_lista.php">
<table>
    <tr>
        <th>Matricula</th>
        <th>Longitud</th>
        <th>Potencia</th>
        <th>Motor</th>
        <th>Año</th>
        <th>Color</th>
        <th>Material</th>
        <th>ID Cliente</th>
        <th>Foto</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </tr>

    <?php
    include("conexionPDO.php");
    include("eliminar_temporales.php");

    // Definimos la cadena de la consulta
    $sql = "SELECT * FROM embarcaciones ORDER BY Matricula";
    // Creamos la consulta y asignamos el resultado a la variable $result
    $result = $conexion->query($sql);
    // Extraemos los valores de $result
    $rows = $result->fetchAll();

    // Como los valores están en un array asociativo, usamos foreach para extraer los valores de $rows
    foreach ($rows as $row) {
        $matricula = $row['Matricula'];
        $longitud = $row['Longitud'];
        $potencia = $row['Potencia'];
        $motor = $row['Motor'];
        $anio = $row['Año'];
        $color = $row['Color'];
        $material = $row['Material'];
        $id_cliente = $row['Id_Cliente'];
        $foto = $row['Fotografia'];
        $imagen = basename(tempnam(getcwd()."/temporales", "temp")) . ".jpg";
        $fichero = fopen("./temporales/" . $imagen, "w");
        fwrite($fichero, $foto);
        fclose($fichero);

        echo "<tr>
            <td><center><b>$matricula</b></center></td>
            <td>$longitud</td>
            <td>$potencia</td>
            <td>$motor</td>
            <td>$anio</td>
            <td>$color</td>
            <td>$material</td>
            <td>$id_cliente</td>
            <td><center><a href='temporales/$imagen'><img src='temporales/$imagen' width='50' border='0'></a></center></td>
            <td><center><input type='checkbox' name='borrar[]' value='$matricula'></center></td>
            <td><center><a href='editar_embarcacion.php?matricula=$matricula'>Editar</a></center></td>
        </tr>";
    }
    ?>

</table>

<div class="botones">
    <input type="submit" value="Eliminar embarcaciones seleccionadas" id="eliminar">
    <input type="reset" value="Deseleccionar Todos" id="deseleccion">    
    

</div>
</form>

<button id="introducir" onclick="window.location.href='introducir_embarcaciones.php';">Ir a introducir Embarcaciones</button>

</html>
