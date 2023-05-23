<?php
include("conexionPDO.php");
$numeroFactura = $_POST["numero_factura"];
$matricula = $_POST["matricula"];
$manoDeObra = $_POST["mano_de_obra"];
$precioHora = $_POST["precio_hora"];
$fechaEmision = $_POST["fecha_emision"];
$fechaPago = $_POST["fecha_pago"];
$baseImponible = $_POST["base_imponible"];
$iva = $_POST["iva"];
$total = $_POST["total"];

$sql = "UPDATE factura
SET 
Matricula='$matricula',
Mano_de_Obra='$manoDeObra',
Precio_Hora='$precioHora',
Fecha_Emision='$fechaEmision',
Fecha_Pago='$fechaPago',
Base_Imponible='$baseImponible',
IVA='$iva',
Total='$total'
WHERE Numero_Factura='$numeroFactura'";

$update = $conexion->prepare($sql);
$update->execute();
?>
