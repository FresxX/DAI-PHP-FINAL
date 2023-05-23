<?php
include("seguridad.php");
include "conexionPDO.php";

$idDetFactura = $_GET["idDetFactura"];
$error = 0;

$SentenciaSQL = "DELETE FROM detalle_factura WHERE Id_Det_Factura = :idDetFactura";
$consulta = $conexion->prepare($SentenciaSQL);
$consulta->bindParam(':idDetFactura', $idDetFactura);

if ($consulta->execute()) {
    echo "<br><br> El detalle de factura ha sido eliminado correctamente.";
} else {
    $error = 1;
}
?>
