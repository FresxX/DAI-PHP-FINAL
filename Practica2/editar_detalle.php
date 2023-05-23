<?php
include("conexionPDO.php");

$idDetFactura = $_GET['idDetFactura'];
$sql = "SELECT * FROM detalle_factura WHERE Id_Det_Factura = '$idDetFactura'";
$result = $conexion->query($sql);
$rows = $result->fetchAll();

foreach ($rows as $row) {
    $idDetFactura = $row['Id_Det_Factura'];
    $numeroFactura = $row['Numero_Factura'];
    $referencia = $row['Referencia'];
    $unidades = $row['Unidades'];

    // Mostrar el formulario de edición para este detalle de factura
    echo "
        <form action='editar_detalle_factura.php' method='post'>
            <table>
                <tr>
                    <td>ID Detalle de Factura:</td>
                    <td><input type='text' name='id_det_factura' value='$idDetFactura'></td>
                </tr>
                <tr>
                    <td>Número de Factura:</td>
                    <td><input type='text' name='numero_factura' value='$numeroFactura'></td>
                </tr>
                <tr>
                    <td>Referencia:</td>
                    <td><input type='text' name='referencia' value='$referencia'></td>
                </tr>
                <tr>
                    <td>Unidades:</td>
                    <td><input type='text' name='unidades' value='$unidades'></td>
                </tr>
            </table>
            <input type='submit' value='Guardar cambios'>
        </form>";

    // Botón para eliminar el registro del detalle de factura
    echo "<form action='eliminar_detalle_factura2.php' method='get'>
            <input type='hidden' name='idDetFactura' value='$idDetFactura'>
            <input type='submit' value='Eliminar'>
        </form>";
}
?>
