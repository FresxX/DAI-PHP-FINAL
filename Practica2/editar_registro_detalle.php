<?php
include("conexionPDO.php");

$idDetFactura = $_POST["id_det_factura"];
$numeroFactura = $_POST["numero_factura"];
$referencia = $_POST["referencia"];
$unidades = $_POST["unidades"];

$sql = "UPDATE detalle_factura
SET 
Numero_Factura='$numeroFactura',
Referencia='$referencia',
Unidades='$unidades'
WHERE Id_Det_Factura='$idDetFactura'";

$update = $conexion->prepare($sql);
$update->execute();

// Redireccionar a la página listar.php después de guardar los cambios
header("Location: listar_detalle_factura.php");
exit();
?>
