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


        <?php
include("conexionPDO.php");

$referencia = $_GET['referencia'];
$sql = "SELECT * FROM repuestos WHERE Referencia = '$referencia'";
$result = $conexion->query($sql);
$rows = $result->fetchAll();

foreach ($rows as $row) {
    $referencia = $row['Referencia'];
    $descripcion = $row['Descripcion'];
    $importe = $row['Importe'];
    $ganancia = $row['Ganancia'];

    // Mostrar el formulario de edición para este repuesto
    echo "
        <form action='editar_registro_repuesto.php' method='post'>
            <table>
                <tr>
                    <td>Referencia:</td>
                    <td><input type='text' name='referencia' value='$referencia'></td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td><input type='text' name='descripcion' value='$descripcion'></td>
                </tr>
                <tr>
                    <td>Importe:</td>
                    <td><input type='text' name='importe' value='$importe'></td>
                </tr>
                <tr>
                    <td>Ganancia:</td>
                    <td><input type='text' name='ganancia' value='$ganancia'></td>
                </tr>
            </table>
            <input type='submit' value='Guardar cambios'>
        </form>";

    // Botón de eliminar
    echo "
        <form action='eliminar_detalle_repuesto.php' method='post'>
            <input type='hidden' name='referencia' value='$referencia'>
            <input type='submit' value='Eliminar repuesto'>
        </form>";
}
?>

</div>
</body>
</html>

