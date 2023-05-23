<?php
include("conexionPDO.php");

$numeroFactura = $_POST["numeroFactura"];
$matricula = $_POST["matricula"];
$manoDeObra = $_POST["manoDeObra"];
$precioHora = $_POST["precioHora"];
$fechaEmision = $_POST["fechaEmision"];
$fechaPago = $_POST["fechaPago"];

$iva = $_POST["iva"];

$baseImponible = $manoDeObra*$precioHora;
$total = $baseImponible * (1+($iva/100));

$SentenciaSQL = "INSERT INTO factura(Numero_Factura, Matricula, Mano_de_Obra, Precio_Hora, Fecha_Emision, Fecha_Pago, Base_Imponible, IVA, Total)
                VALUES ('$numeroFactura', '$matricula', '$manoDeObra', '$precioHora', '$fechaEmision', '$fechaPago', '$baseImponible', '$iva', '$total')";

// Ejecutamos la consulta y asignamos el resultado a la variable $result
$result = $conexion->query($SentenciaSQL);
if (!$result) {
    echo "<br>Error al introducir la factura en la base de datos";
} else {
    header("Location: listar_factura.php");
}
?>
